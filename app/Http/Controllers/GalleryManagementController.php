<?php

namespace App\Http\Controllers;

use App\Models\Submission;

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

        $submission = Submission::with('images')->find($submissionId);

        return view('shopify-gallery.gallery-app-admin.edit')->with(['submission' => $submission]);
    }


}
