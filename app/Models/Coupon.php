<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CouponCategory;
use App\Models\CouponQuizEventTag;
class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'coupons';

    public function couponCategory(){

        return $this->belongsTo(CouponCategory::class ,'coupon_id','id');
    }

    public function coupon_tag(){

        return $this->hasMany(CouponQuizEventTag::class ,'coupon_id','id');
    }

}
