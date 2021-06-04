<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Coupon extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'Coupon';
    protected $guarded = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Coupon has been {$eventName}";
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
