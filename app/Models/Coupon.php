<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CouponCategory;
class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'coupons';
    public function couponCategory(){

        return $this->belongsTo(CouponCategory::class ,'coupon_id','id');
    }
}
