<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WLPdetails extends Model
{
    public function usr(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
