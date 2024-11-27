<?php

namespace App\Services;

class SuperService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function dashboard()
    {
       return view('superadmin.dashboard');
    }
}
