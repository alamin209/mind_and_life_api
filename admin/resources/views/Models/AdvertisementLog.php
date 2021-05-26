<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class AdvertisementLog extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
     protected static $logFillable = true;
    protected static $logName = 'Advertisement Log';
    protected $guarded=[];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Advertisement   has been {$eventName}";
    }


    public function author(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
