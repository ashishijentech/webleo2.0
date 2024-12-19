<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DealerService;

class DealerController extends Controller
{

    public function __construct(private DealerService $dealerService)
    {

    }
    public function index()
    {

    }

    public function create()
    {
        return view('distributor.createdealer');
    }

    public function store(Request $request)
    {
        $this->dealerService->store($request);
        return redirect()->back()->with('success', 'Delear Added');
    }

    public function dashboard(){
        return view('dealer.dashboard');
    }

    
}