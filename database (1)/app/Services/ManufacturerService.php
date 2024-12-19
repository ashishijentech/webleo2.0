<?php
namespace App\Services;
use App\Models\User;
use App\Models\Manuanufacturer;
class ManufacturerService
{
  

    public function createManufacturer($request){
        $user = new User;
        $user->name = $request['manufacturer_name'];
        $user->email = $request['email'];
        $user->password = 'Manuf@12345';
        $user->role = 'manufacturer';
        $user->save();
        $details = new Manuanufacturer;
        $details->user_id = $user->id;
        $details->parent_id = $request['parent_name'];
        $details->country = $request['country'];
        $details->state = $request['state'];
        $details->code = $request['manufacturer_code'];
        $details->businees_name = $request['business_name'];
        $details->gst_no = $request['gst_number'];
        $details->mobile_no = $request['mobile_no'];
        $details->address = $request['address'];
        #logo
        $logo =  time().rand(1,99).'logo'.$request['logo']->extension();
        $request['logo']->storeAs('uploads', $logo);
        $details->logo = $logo;
        $details->save();


    }

    public function view(){
        $manufacturer = Manuanufacturer::with('usrdetails')->get();
        return $manufacturer;
    }
}

