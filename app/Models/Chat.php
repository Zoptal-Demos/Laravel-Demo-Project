<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['conversion_id','from_id','to_id','message','time'];

    public function from_user(){

    	return $this->hasOne(User::class,'id','from_id');

    }
    public function to_user(){

    	return $this->hasOne(User::class,'id','to_id');

    }
}
