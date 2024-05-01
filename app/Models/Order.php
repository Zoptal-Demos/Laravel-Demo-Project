<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'agency_id',
        'pickup_lat',
        'pickup_lng',
        'pickup_location',
        'drop_lat',
        'drop_lng',
        'drop_location',
        'vehicle_id',
        'goods_id',
        'price',
        'date',
        'name',
        'phone_number',
        'cancel_reason',
        'order_status'
    ];

    public function vehicle(){
        return $this->hasOne(Vehicle::class,'vehicle_id','vehicle_id');
    }

    public function agency(){
        return $this->hasOne(User::class,'id','agency_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }


}
