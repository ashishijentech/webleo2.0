<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistributorsController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('manufacturer.createdistributor');
    }
}
