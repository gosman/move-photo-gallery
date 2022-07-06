<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class GalleryManagementController extends Controller
{

    public function index()
    {

        $submissions = Submission::join('submission_images', 'submission.id', 'submission_images.submission_id')
            ->orderBy('submission_images.approved')
            ->orderBy('submission_images.created_at')
            ->get();

        print_r($submissions);
        exit;

        return view('shopify-gallery.gallery-app-admin.index');
    }

}
