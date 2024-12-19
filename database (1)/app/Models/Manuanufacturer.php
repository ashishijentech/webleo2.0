<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manuanufacturer extends Model
{   
    protected $table = 'manuanufacturers';
    protected $primaryKey = 'user_id';
    public function usrdetails(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
