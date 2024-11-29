<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminOnboardRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admindetails;
use App\Services\AdminService;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

  public function __construct(private AdminService $adminService) {
    
  }

  public function index()
  {
    return $this->adminService->index();
  }
  public function dashboard()
  {
    return $this->adminService->dashboard();
  }
  

  public function create()
  {
    return $this->adminService->create();
  }

  public function store(AdminOnboardRequest $request)
  {

   $this->adminService->store($request);
    return redirect()->back()->with('success', 'Onbording Completed!');
  }
  public function assignElementView()
  {
    return view('superadmin.assignelement');
  }
  
}
