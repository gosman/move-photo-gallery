<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SubmissionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GalleryManagementController extends Controller
{

    public function index()
    {

        $submissions = Submission::with('images')->orderBy('created_at')->whereHas('images', function ($query) {

            $query->where('approved', 0);
        })->get();

        return view('shopify-gallery.gallery-app-admin.index')->with(['submissions' => $submissions]);
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


}
