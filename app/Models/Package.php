<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'tracking_number',
        'sender_name',
        'receiver_name',
        'pickup_address',
        'delivery_address',
        'status',
        'courier_id'
    ];

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id');
    }
}
