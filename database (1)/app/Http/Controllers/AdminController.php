<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminOnboardRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admindetails;
use App\Models\AssignElement;
use App\Models\Element;
use App\Services\AdminService;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

  public function __construct(private AdminService $adminService)
  {

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
  public function admin_edit_store(Request $request, $id)
  {
    $this->adminService->admin_edit_store($request, $id);
    return redirect()->route("superadmin.admin")->with('success', 'Update complite!');
  }
  public function admin_destroy($id)
  {
    $admindetail = Admindetails::findOrFail($id);

    // Delete the associated user
    $user = $admindetail->usr;
    if ($user) {
      $user->delete(); // Delete the user from the users table
    }

    // Delete the admindetails record
    $admindetail->delete();

    return redirect()->back()->with('success', 'delate successful');

  }

  public function admin_edit($id)
  {
    // Fetch the admin details and associated user data
    $details = Admindetails::with('usr')->findOrFail($id);

    return view('superadmin.adminedit', compact('details'));
  }

  public function assignElementView()
  {
    $element = Element::all();
    $admin = User::where('role', 'admin')->get();
    return view('superadmin.assignelement')->with(compact('element', 'admin'));
  }

  public function storeAssignElement(Request $request)
  {
    $this->adminService->storeAssignElement($request);
    return redirect()->back()->with('success', 'Element assigned successfully');

  }



}
