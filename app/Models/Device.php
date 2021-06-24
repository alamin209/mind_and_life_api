<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Device extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user_id(){

        return $this->belongsTo(User::class,'user_id','id');
    }

}
