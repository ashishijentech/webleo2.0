<?php

namespace App\Http\Controllers;
use App\Services\TechnicianService;

use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function __construct(private TechnicianService $technicianService)
    {

    }
    public function index()
    {

    }
    public function create()
    {
        return view("dealer.createtechnician");
    }

    public function store(Request $request)
    {
        $this->technicianService->create($request);
        return redirect()->back()->with("success", "Technician Added!");

    }

    public function dashboard(){
        return view("technician.dashboard");
    }
}