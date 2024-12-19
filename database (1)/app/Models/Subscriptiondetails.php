<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriptiondetails extends Model
{
    //
    public function usr(): HasMany
    {
        return $this->hasMany(User::class, 'id','user_id');
    }  
}
