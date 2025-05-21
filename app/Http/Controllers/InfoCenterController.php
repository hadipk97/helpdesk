<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoCenterController extends Controller
{
    public function index(){

        return view('info-center.index');
    }
}
