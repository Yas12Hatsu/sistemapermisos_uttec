<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index()
    {
        return view('presentacion');
    }
}
