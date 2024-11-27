<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    
     public function __construct(private ProfileService $profileService)
     {
        
     }

     public function edit(Request $request): View
    {
        return $this->profileService->edit($request);
    }

    
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        return $this->profileService->update($request);
    }

    
    public function destroy(Request $request): RedirectResponse
    {
        return $this->profileService->destroy($request);
    }

}
