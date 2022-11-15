<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        // Page Information
        $page_title = 'Home';
        $page_description = "Home Library";

        // Elements
        $header = false;
        $bottom = true;

        // Query
        $name = auth()->user()->name;


        return view('library/profile/index', compact('page_title', 'page_description', 'header', 'bottom', 'name'));
    }
}
