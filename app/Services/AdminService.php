<?php

namespace App\Services;
use App\Models\User;
use App\Models\Admindetails;
use Illuminate\Http\Request;


use App\Http\Requests\AdminOnboardRequest;
use App\Models\AssignElement;

class AdminService
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
    //
  }

  public function index()
  {
    $details = Admindetails::with('usr') // Load related 'usr' data
      ->whereIn('user_id', User::select('id')->where('role', 'admin')->pluck('id'))
      ->get();

    return view('superadmin.adminlist', compact('details'));
  }

  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function create()
  {
    return view('superadmin.createadmin');
  }


  public function store(AdminOnboardRequest $request)
  {
    $user = new User;
    $user->name = $request['name_of_the_business'];
    $user->email = $request['email'];
    $user->password = '123@Admin';
    $user->role = 'admin';
    $user->save();

    $detais = new Admindetails;
    $detais->user_id = $user->id;
    $detais->business_name = $request['name_of_the_business'];
    $detais->regd_address = $request['regd_address'];
    $detais->gstin_no = $request['gstin_no'];
    $detais->pan_no = $request['pan_no'];
    $detais->contact_no = $request['contact_no'];
    $detais->name_of_the_business_owner = $request['name_of_the_business_owner'];
    #gst
    $gst_certificate = time() . rand(1, 99) . 'gst' . $request['gst_certificate']->extension();
    $request['gst_certificate']->storeAs('uploads', $gst_certificate);
    $detais->gst_certificate = $gst_certificate;
    #pan_card
    $pan_filename = time() . rand(1, 99) . 'pan' . $request['pan_card']->extension();
    $request['gst_certificate']->storeAs('uploads', $pan_filename);
    $detais->pan_card = $pan_filename;
    #incorporation_certificate
    $incorporation_certificate = time() . rand(1, 99) . 'incorporation_certificate' . $request['incorporation_certificate']->extension();
    $request['incorporation_certificate']->storeAs('uploads', $incorporation_certificate);
    $detais->incorporation_certificate = $incorporation_certificate;
    #logo
    $logo = time() . rand(1, 99) . 'logo.' . $request['company_logo']->extension();
    $request['company_logo']->storeAs('uploads', $logo);
    $detais->logo = $logo;
    $detais->save();

  }


  public function admin_edit_store(Request $request, $id)
  {
    $details = Admindetails::findOrFail($id);
    $user = $details->usr;

    // Update the User model
    $user->name = $request['name_of_the_business'];
    $user->email = $request['email'];
    $user->save();

    // Update the Admindetails model
    $details->business_name = $request['name_of_the_business'];
    $details->regd_address = $request['regd_address'];
    $details->gstin_no = $request['gstin_no'];
    $details->pan_no = $request['pan_no'];
    $details->contact_no = $request['contact_no'];
    $details->name_of_the_business_owner = $request['name_of_the_business_owner'];

    // Check and update files if they are uploaded
    if ($request->hasFile('gst_certificate')) {
      $gst_certificate = time() . rand(1, 99) . 'gst.' . $request['gst_certificate']->extension();
      $request['gst_certificate']->storeAs('uploads', $gst_certificate);
      $details->gst_certificate = $gst_certificate;
    }

    if ($request->hasFile('pan_card')) {
      $pan_filename = time() . rand(1, 99) . 'pan.' . $request['pan_card']->extension();
      $request['pan_card']->storeAs('uploads', $pan_filename);
      $details->pan_card = $pan_filename;
    }

    if ($request->hasFile('incorporation_certificate')) {
      $incorporation_certificate = time() . rand(1, 99) . 'incorporation_certificate.' . $request['incorporation_certificate']->extension();
      $request['incorporation_certificate']->storeAs('uploads', $incorporation_certificate);
      $details->incorporation_certificate = $incorporation_certificate;
    }

    if ($request->hasFile('company_logo')) {
      $logo = time() . rand(1, 99) . 'logo.' . $request['company_logo']->extension();
      $request['company_logo']->storeAs('uploads', $logo);
      $details->logo = $logo;
    }

    $details->save();
  }

  public function storeAssignElement(Request $request)
  {
    $assignElement = new AssignElement();
    $assignElement->user_id = $request['admin'];
    $assignElement->element_id = $request['element'];
    $assignElement->save();

  }

}




