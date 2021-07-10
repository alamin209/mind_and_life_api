<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventCategory;
use App\Models\CouponQuizEventTag;
class Event extends Model
{
    use HasFactory;

    public function event_category(){

        return $this->belongsTo(EventCategory::class);

    }

    public function event_tag(){

        return $this->hasMany(CouponQuizEventTag::class ,'event_id','id');
    }

}
