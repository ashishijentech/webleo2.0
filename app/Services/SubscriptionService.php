<?php

namespace App\Services;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscriptiondetails;
use Illuminate\Http\Request;

class SubscriptionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subscribtions = SubscriptiondetailS::all();
        return view('admin.subscriptionlist')->with(compact('subscribtions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.createsubscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
        //
        $newsubs = new Subscriptiondetails();
        $newsubs->parentId = $request['Parentid'];
        $newsubs->packageType = $request['PackageType'];
        $newsubs->packageName = $request['PackageName'];
        $newsubs->billingCycle = $request['BillingCycle'];
        $newsubs->description = $request['Description'];
        $newsubs->price = $request['Price'];
        $checkbox = $request['Renewalcheckbox'];
        if ($checkbox == '') {
            $newsubs->isRenewal = 'No';
        } else {
            $newsubs->isRenewal = 'yes';
        }

        $newsubs->save();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $subscriptiondetails = SubscriptiondetailS::find($id);
        if (!$subscriptiondetails) {
            return redirect()->route('admin.view.subscriptionlist')->with('error', 'User not found.');
        }
        return view('admin.editsubscription', compact('subscriptiondetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequest $request, string $id)
    {

        $subscriptiondetails = Subscriptiondetails::find($id);

        if (!$subscriptiondetails) {
            return redirect()->route('admin.view.subscriptionlist')->with('error', 'Subscription not found.');
        }
    
        $subscriptiondetails->parentId = $request->input('Parentid');
        $subscriptiondetails->packageType = $request->input('PackageType');
        $subscriptiondetails->packageName = $request->input('PackageName');
        $subscriptiondetails->billingCycle = $request->input('BillingCycle');
        $subscriptiondetails->description = $request->input('Description');
        $subscriptiondetails->price = $request->input('Price');
        $subscriptiondetails->isRenewal = $request->has('Renewalcheckbox') ? 'Yes' : 'No';
    
        $subscriptiondetails->save();
    
        return redirect()->route('admin.view.subscriptionlist')->with('success', 'Subscription updated successfully.');
    }

    public function destroy(string $id)
    {
        //
        $subscriptiondetails = SubscriptiondetailS::find($id);
        if ($subscriptiondetails) {
            $subscriptiondetails->delete(); // Delete the user
            return redirect()->route('admin.view.subscriptionlist')->with('success', 'User deleted successfully.');
        }
        return redirect()->route('admin.view.subscriptionlist')->with('error', 'User not found.');
    }

}
