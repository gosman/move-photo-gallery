<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class GalleryManagementController extends Controller
{

    public function index()
    {

        $submissions = Submission::count();

        print_r($submissions);
        exit;

        return view('shopify-gallery.gallery-app-admin.index');
    }

}
