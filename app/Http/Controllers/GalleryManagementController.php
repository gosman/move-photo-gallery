<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class GalleryManagementController extends Controller
{

    public function index()
    {

        $submissionsUnapproved = Submission::with('images')
            ->orderBy('created_at')
            ->whereHas('images', function ($query) {

                $query->where('approved', 0);
            })
            ->get();

        print_r($submissionsUnapproved->toArray());
        exit;

        return view('shopify-gallery.gallery-app-admin.index');
    }

}
