<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopifyHomeController extends Controller
{

    public function index()
    {

        return view('shopify.index');
    }

}
