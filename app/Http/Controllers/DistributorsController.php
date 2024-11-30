<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorsOnboardRequest;
use App\Services\DistributorsService;
use Illuminate\Http\Request;

class DistributorsController extends Controller
{
    public function __construct(private DistributorsService $distributorservice)
    {

    }

    public function index()
    {
        $distributors = $this->distributorservice->index();
        return view("manufacturer.distributorlist")->with(compact("distributors"));
    }

    public function create()
    {
        return $this->distributorservice->create();
    }


    public function store(DistributorsOnboardRequest $request)
    {
        $this->distributorservice->store($request);
        return redirect()->back()->with('success', 'Distributer Added!');
    }

    public function dashboard()
    {
        return view('distributor.dashboard');
    }
}