<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarController extends Controller
{
    public function index()
    {
        return view('administrar.index');
    }

}
