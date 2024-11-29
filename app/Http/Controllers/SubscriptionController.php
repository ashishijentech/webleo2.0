<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscriptiondetails;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $subscriptionService)
    {
        
    }

    public function index()
    {
        return $this->subscriptionService->index();
    }

    public function create()
    {
        return $this->subscriptionService->create();
    }

    public function store(SubscriptionRequest $request)
    {
        $this->subscriptionService->store($request);
        return redirect()->back()->with('success', 'Subscription Package Added');
    }

    public function show(string $id)
    {
        return $this->subscriptionService->show($id);
    }

    public function edit(string $id)
    {
        return $this->subscriptionService->edit($id);
    }

    public function update(SubscriptionRequest $request, string $id)
    {
        return $this->subscriptionService->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->subscriptionService->destroy($id);
    }
}
