<?php

namespace App\Http\Controllers;

use App\Models\Subscriptiondetails;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
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
    public function store(Request $request)
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

        return redirect()->back()->with('success', 'Subscription Package Added');
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
        //

        //return view('admin.editsubscription', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        // $user = SubscriptiondetailS::find($id);

        // if ($user) {
        //     $user->update([
        //         'parentId' => $request->input('Parentid'),
        //         'packageType' => $request->input('PackageType'),
        //         'packageName' => $request->input('PackageName'),
        //         'billingCycle' => $request->input('BillingCycle'),
        //         'description' => $request->input('Description'),
        //         'price' => $request->input('Price'),

                
        //     ]);

        //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
        // }

        // return redirect()->route('users.index')->with('error', 'User not found.');



        $subscriptiondetails = Subscriptiondetails::find($id);

        // Check if the record exists
        if (!$subscriptiondetails) {
            return redirect()->route('admin.view.subscriptionlist')->with('error', 'Subscription not found.');
        }
    
        // Update fields with the new values
        $subscriptiondetails->parentId = $request->input('Parentid');
        $subscriptiondetails->packageType = $request->input('PackageType');
        $subscriptiondetails->packageName = $request->input('PackageName');
        $subscriptiondetails->billingCycle = $request->input('BillingCycle');
        $subscriptiondetails->description = $request->input('Description');
        $subscriptiondetails->price = $request->input('Price');
        $subscriptiondetails->isRenewal = $request->has('Renewalcheckbox') ? 'Yes' : 'No';
    
        // Save the changes to the database
        $subscriptiondetails->save();
    
        return redirect()->route('admin.view.subscriptionlist')->with('success', 'Subscription updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
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
