<?php

namespace App\Http\Controllers\DashBoard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

    return view('dashboard.index');

    }//end index

}///end controller
