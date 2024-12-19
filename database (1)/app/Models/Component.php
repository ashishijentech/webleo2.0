<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
     public function options()
     {
          return $this->hasMany(ComponentOption::class);
     }

}
