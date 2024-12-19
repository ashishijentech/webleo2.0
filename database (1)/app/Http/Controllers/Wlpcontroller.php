<?php

namespace App\Http\Controllers;

use App\Http\Requests\WlpOnboardRequest;
use Illuminate\Http\Request;
use App\Services\WlpService;

class Wlpcontroller extends Controller
{
    
   private $wlpservice;
    public function __construct(WlpService $wlpService){
        $this->wlpservice = $wlpService;

    }
    public function index(){
        $wlp = $this->wlpservice->view();
        return view('admin.wlplist')->with(compact('wlp'));
    }

    public function dashboard(){
        return view('wlp.dashboard');
    }
    public function create_wlp(){
        return view('admin.createwlp');
    }

    public function store(WlpOnboardRequest $request){
      $this->wlpservice->createWlp($request) ;
      return redirect()->back()->with('success', 'WLP Created');
     
    }
}
