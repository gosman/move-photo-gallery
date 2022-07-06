<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class GalleryManagementController extends Controller
{

    public function index()
    {

        $submissionsApproved = Submission::with('images')->orderBy('created_at')->whereHas('images', function ($query) {

            $query->where('approved', 1);
        })->get();

        print_r($submissionsApproved->toArray());
        exit;

        return view('shopify-gallery.gallery-app-admin.index');
    }

}
