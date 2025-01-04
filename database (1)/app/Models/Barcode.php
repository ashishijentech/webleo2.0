<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barcode extends Model
{
    protected $table = 'barcodes';

    public function elementType(): HasMany
    {
        return $this->hasMany(ElementType::class, 'id', 'type_id');
    }

    public function modelNo(): HasMany
    {
        return $this->hasMany(DeviceModelNo::class, 'id', 'model_id');
    }

    public function partNo(): HasMany
    {
        return $this->hasMany(DevicePartNo::class, 'id', 'part_id');
    }
}