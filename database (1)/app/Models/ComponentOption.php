<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentOption extends Model
{

    protected $fillable = ['name_id', 'option_value'];

    public function component()
    {
        return $this->belongsTo(Component::class, 'name_id', 'id');
    }
}