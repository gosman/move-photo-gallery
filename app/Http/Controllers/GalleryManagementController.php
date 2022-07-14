<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SubmissionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GalleryManagementController extends Controller
{

    private $items;


    public function index()
    {

        $submissions = Submission::with('images')->orderBy('created_at')->whereHas('images', function ($query) {

            $query->where('approved', 0);
        })->paginate(5);

        return view('shopify-gallery.gallery-app-admin.index')->with(['submissions' => $submissions]);
    }


    public function approved()
    {

        $submissions = Submission::with('images')->orderBy('created_at')->whereHas('images', function ($query) {

            $query->where('approved', 1);
        })->paginate(5);

        return view('shopify-gallery.gallery-app-admin.approved')->with(['submissions' => $submissions]);
    }


    public function search()
    {

        $this->find('make');
        $this->find('model');


        return response()->json($this->items);
    }


    public function edit($submissionId)
    {

        $shop = Auth::user();
        $themeId = $shop->api()->rest('GET', '/admin/themes.json', ['role' => 'main'])['body']['themes'][0]['id'];
        $asset = $shop->api()
            ->rest('GET', "/admin/themes/{$themeId}/assets.json",
                ['asset[key]' => 'assets/make-model-year.json'])['body']['asset']['value'];
        $makeModelYear = json_decode($asset, true);


        $submission = Submission::with('images')->find($submissionId);

        return view('shopify-gallery.gallery-app-admin.edit')->with([
            'submission' => $submission,
            'makeModelYear' => $makeModelYear,
        ]);
    }


    public function update($imageId)
    {

        if ($this->isAllowed()) {

            Submission::find($imageId)->update(request()->all());

            return response()->json(['success' => true]);
        }
    }


    public function deleteImage($imageId)
    {

        if ($this->isAllowed()) {

            SubmissionImage::find($imageId)->delete();

            return response()->json(['success' => true]);
        }
    }


    public function updateApproval($imageId)
    {

        if ($this->isAllowed()) {

            SubmissionImage::find($imageId)->update(request()->all());

            return response()->json(['success' => true]);
        }
    }


    private function isAllowed()
    {

        if (request()->header('origin') === config('app.url')) {

            return true;
        }

        return false;
    }


    private function find($column)
    {

        $term = request()->term;

        Submission::where($column, 'like', "%{$term}%")->each(function ($item) use ($column) {

            $this->items[] = [
                'id' => $item->$column,
                'value' => $column,
                'label' => Str::title($column).': '.$item->make,
            ];
        });
    }


}
