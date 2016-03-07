<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'description',
        'device_number'
    ];

    protected $dates = [
        'back'
    ];

    public function person() {
        return $this->belongsTo(Person::class, 'lent_by');
    }

    public function delayed() {
        if($this->back < Carbon::now()) {
            return true;
        }
        return false;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
