<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Coupon;
use App\models\User;
class UserCouponRelation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "user_coupon_relations";

    public function coupon(){
        return $this->belongsTo(Coupon::class ,'coupon_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

}
