<?php

namespace App\Http\Controllers;

use App\Services\SuperService;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function __construct(private SuperService $superService)
    {
        
    }

    public function dashboard()
    {
        return $this->superService->dashboard();
    }
}
