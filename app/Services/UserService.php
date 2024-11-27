<?php

namespace App\Services;
use App\Models\User;
class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
  {
    
  }


  public function store($data, $role): string
  {
    $user = new User;
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = '123@General';
    $user->role = $role;
    $user->save();
    return $user->id;
  }
}
