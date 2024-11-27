<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Services\ElementService;

class ElementController extends Controller
{
    public function __construct(private ElementService $elementService)
    {
        
    }

    public function index(){
        $this->elementService->index();
    }

    public function store(Request $request){
        $this->elementService->store($request);
    }
}
