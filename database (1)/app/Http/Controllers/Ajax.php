<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Models\ElementType;
use App\Models\DeviceModelNo;
use App\Models\DevicePartNo;
use App\Models\Customfields;
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

    public function fetchModelNoByType($type_id)
    {
        $model = DeviceModelNo::where('type_id', $type_id)->get();
        return $model;
    }

    public function fetchPartNoByModel($model_id)
    {
        $partNo = DevicePartNo::where('model_id', $model_id)->get();
        return $partNo;
    }

    public function fetchCustomFields($id, $parent)
    {
        if ($parent == 'element') {
            $customField = Customfields::where('element_id', $id)
                ->where('model_id', null)
                ->where('type_id', null)
                ->where('part_id', null)
                ->get(['colSize', 'select', 'inputType', 'id']);
        } elseif ($parent == 'type') {
            $customField = Customfields::where('type_id', $id)
                ->where('model_id', null)
                ->where('part_id', null)
                ->get(['colSize', 'select', 'inputType', 'id']);
        } elseif ($parent == 'modelNo') {
            $customField = Customfields::where('model_id', $id)
                ->where('part_id', null)
                ->get(['colSize', 'select', 'inputType', 'id']);
        }


        return $customField;
    }
}