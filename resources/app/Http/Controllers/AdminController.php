<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admindetails;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function index(){
      $admin = User::select('id')->where('role','admin')->get();
      $details = [];
      foreach ($admin as $value) {
       $details[] = Admindetails::with('usr')->where('user_id',$value->id)->get();
      }
      return view('superadmin.adminlist')->with(compact('details'));
    }

    public function dashboard(){
     return view('admin.dashboard');
    }

    public function create(){
        return view('superadmin.createadmin');
    }

   
    public function store(Request $request){
    $user = new User;
    $user->name = $request['name_of_the_business'];
    $user->email = $request['email'];
    $user->password = '123@Admin';
    $user->role = 'admin';
    $user->save();

    $detais = new Admindetails;
    $detais->user_id  = $user->id;
    $detais->business_name = $request['name_of_the_business'];
    $detais->regd_address = $request['regd_address'];
    $detais->gstin_no = $request['gstin_no'];
    $detais->pan_no = $request['pan_no'];
    $detais->contact_no  = $request['contact_no'];
    #gst
    $gst_certificate =  time().rand(1,99).'gst'.$request['gst_certificate']->extension();
    $request['gst_certificate']->storeAs('uploads', $gst_certificate);
    $detais->gst_certificate = $gst_certificate;
    #pan_card
    $pan_filename =  time().rand(1,99).'pan'.$request['pan_card']->extension();
    $request['gst_certificate']->storeAs('uploads', $pan_filename);
    $detais->pan_card = $pan_filename;
    #incorporation_certificate
    $incorporation_certificate =  time().rand(1,99).'incorporation_certificate'.$request['incorporation_certificate']->extension();
    $request['incorporation_certificate']->storeAs('uploads', $incorporation_certificate);
    $detais->incorporation_certificate = $incorporation_certificate;
     #logo
     $logo =  time().rand(1,99).'logo.'.$request['company_logo']->extension();
     $request['company_logo']->storeAs('uploads', $logo);
     $detais->logo = $logo;
     $detais->save();
     return redirect()->back()->with('success','Onbording Completed!');
    }


}
