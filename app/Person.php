<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'matriculation',
        'class'
    ];

    public function devices() {
        $this->hasMany(Device::class);
    }
}
