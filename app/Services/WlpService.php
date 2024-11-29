<?php
namespace App\Services;

use App\Http\Requests\WlpOnboardRequest;
use App\Models\WLPdetails;
use App\Models\User;

class WlpService
{
    public function createWlp(WlpOnboardRequest $request)
    {
      $user = new User;
      $user->name = $request['name'];
      $user->email = $request['billing_email'];
      $user->password = 'WLP@12345';
      $user->role = 'wlp';
      $user->save();
      $details = new WLPdetails;
      $details->user_id = $user->id;
      $details->country = $request['country'];
      $details->state = $request['state'];
      $details->mobile_no = $request['mobile_no'];
      $details->parent_name = $request['parent_name'];
      $details->parent_code = $request['parent_code'];
      $details->website = $request['website'];
      $details->web_url = $request['web_url'];

      $logo =  time().rand(1,99).'logo'.$request['logo']->extension();
      $request['logo']->storeAs('uploads', $logo);
      $details->logo= $logo;
      
      $details->address = $request['address'];
      $details->sales_mobile_no = $request['sales_mobile_no'];
      $details->landline_no = $request['landline_no'];
      $details->smart_parent_app_package = $request['smart_parent_app_package'];
      $details->show_powered_by = $request['show_powered_by'];
      $details->power_by = $request['power_by'];
      $details->account_limit = $request['account_limit'];
      $details->http_sms_url = $request['http_sms_url'];
      $details->http_sms__gateway_method = $request['http_sms__gateway_method'];
      $details->gstn_no = $request['gstn_no'];
      $details->billing_email = $request['billing_email'];
      $details->isallowthirdpartyapi = $request['isallowthirdpartyapi'];
      $details->default_lan = $request['language'];
      $details->save();
    }
    public function view(){
        $wlp = WLPdetails::with('usr')->get();
        return $wlp;
    }
}


