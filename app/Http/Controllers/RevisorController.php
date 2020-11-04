<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index()
    {
        dd('Che ci fai qui? Sei un revisore?');
    }
}
