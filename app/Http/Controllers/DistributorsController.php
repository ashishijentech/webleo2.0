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

<<<<<<< HEAD
    public function store(Request $request)
    {
=======
    public function store(DistributorsOnboardRequest $request){
>>>>>>> 85684102c4920c18846aca588ad94955466a8e45
        $this->distributorservice->store($request);
        return redirect()->back()->with('success', 'Distributer Added!');
    }

    public function dashboard()
    {
        return view('distributor.dashboard');
    }
}