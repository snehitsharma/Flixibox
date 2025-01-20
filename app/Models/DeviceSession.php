<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSession extends Model
{
    protected $fillable = [
        'user_id',
        'device_name',
        'device_type',
        'ip_address',
        'location',
        'last_activity',
        'is_current_device'
    ];

    protected $casts = [
        'last_activity' => 'datetime',
        'is_current_device' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}