<?php

namespace App\Http\Controllers;

use App\Models\Submission;
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
        $assetUrl = $shop->api()
            ->rest('GET', "/admin/themes/{$themeId}/assets.json",
                ['assets["key"]' => 'assets/make-model-year.json'])['body'];
        //$makeModelYear = Http::get($assetUrl)->body();


        print_r($assetUrl);

        exit;
        $submission = Submission::with('images')->find($submissionId);

        return view('shopify - gallery.gallery - app - admin.edit')->with(['submission' => $submission]);
    }


}
