<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SubmissionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryManagementController extends Controller
{

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

        $json = '[
    {
        "id": "Podiceps nigricollis",
        "label": "Black-necked Grebe",
        "value": "Black-necked Grebe"
    },
    {
        "id": "Nycticorax nycticorax",
        "label": "Black-crowned Night Heron",
        "value": "Black-crowned Night Heron"
    },
    {
        "id": "Tetrao tetrix",
        "label": "Black Grouse",
        "value": "Black Grouse"
    },
    {
        "id": "Limosa limosa",
        "label": "Black-tailed Godwit",
        "value": "Black-tailed Godwit"
    },
    {
        "id": "Chlidonias niger",
        "label": "Black Tern",
        "value": "Black Tern"
    },
    {
        "id": "Larus marinus",
        "label": "Great Black-backed Gull",
        "value": "Great Black-backed Gull"
    },
    {
        "id": "Larus fuscus",
        "label": "Lesser Black-backed Gull",
        "value": "Lesser Black-backed Gull"
    },
    {
        "id": "Larus ridibundus",
        "label": "Black-headed Gull",
        "value": "Black-headed Gull"
    },
    {
        "id": "Turdus merula",
        "label": "Common Blackbird",
        "value": "Common Blackbird"
    },
    {
        "id": "Sylvia atricapilla",
        "label": "Blackcap",
        "value": "Blackcap"
    },
    {
        "id": "Rissa tridactyla",
        "label": "Black-legged Kittiwake",
        "value": "Black-legged Kittiwake"
    },
    {
        "id": "Aegypius monachus",
        "label": "Eurasian Black Vulture",
        "value": "Eurasian Black Vulture"
    }
]';


        return response()->json(json_decode($json));
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


}
