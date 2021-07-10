<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
class CouponCategory extends Model
{
    use HasFactory;

    public function coupons(){

     return $this->hasMany(Coupon::class,'category_id','id');
     
    }
}
