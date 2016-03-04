<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'device_id',
        'person_id',
        'type',
        'comment'
    ];

    protected $dates = [
        'created_at'
    ];

    public function device() {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function person() {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
