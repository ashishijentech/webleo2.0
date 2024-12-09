<?php

namespace App\Services;
use App\Models\Distributor;
use App\Services\UserService;
class DealerService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserService $userService)
    {
        //
    }

    public function index()
    {
        $distributor = Distributor::with('usrdetails')->get();
        return $distributor;
    }

    public function create()
    {
        return view('manufacturer.createdistributor');
    }

    public function store($request)
    {
        $data = ['name' => $request['name'], 'email' => $request['email']];
        $user = $this->userService->store($data, 'dealer');
        // $distributer = new Distributor;
        // $distributer->user_id = $user;
        // $distributer->manuf_id = auth()->user()->id;
        // $distributer->business_name = $request['business_name'];
        // $distributer->gender = $request['gender'];
        // $distributer->mobile = $request['mobile'];
        // $distributer->dob = $request['date_of_birth'];
        // $distributer->is_map_device_edit = $request['map_device_edit'];
        // $distributer->pan_number = $request['pan_number'];
        // $distributer->occupation = $request['occupation'];
        // $distributer->advance_payment = $request['advance_payment'];
        // $distributer->language_known = $request['language_known'];
        // $distributer->country = $request['country'];
        // $distributer->state = $request['state'];
        // $distributer->rto_devision = $request['rto_devision'];
        // $distributer->district = $request['district'];
        // $distributer->pincode = $request['pincode'];
        // $distributer->area = $request['area'];
        // $distributer->address = $request['address'];
        // $distributer->save();
        return 1;
    }
}