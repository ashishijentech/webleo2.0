<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Models\ElementType;

class Ajax extends Controller
{
    public function fetchdistributer($state)
    {
        $distributer = Distributor::where('manuf_id', auth()->user()->id)->where('state', $state)->get();

        return response()->json($distributer);
    }

    public function fetchElementTypeByElemeNt($element_id)
    {
        $type = ElementType::where('element_id', $element_id, )->get();
        return $type;
    }
}