<?php

namespace App\Services;
use App\Services\UserService;
class TechnicianService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserService $userService)
    {
        //
    }

    public function create($data)
    {
        $data = ['name' => $data['name'], 'email' => $data['email']];
        $user = $this->userService->store($data, 'technician');
    }


}