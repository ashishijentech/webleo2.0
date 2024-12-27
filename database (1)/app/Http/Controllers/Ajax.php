<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class Ajax extends Controller
{
    public function fetchdistributer($state)
    {
        $distributer = Distributor::where('manuf_id', auth()->user()->id)->where('state', $state)->get();

        return response()->json($distributer);
    }
}