<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubuserController extends Controller
{
    public function index()
    {
        return view('subuser.index');
    }
}
