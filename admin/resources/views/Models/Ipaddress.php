<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ipaddress extends Model
{

    use  LogsActivity;

    protected static $logUnguarded = true;
     protected static $logFillable = true;
    protected static $logName = 'Ip Address';
    protected $guarded=[];



    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Ip Address   has been {$eventName}";
    }


    public function user(){

        return $this->belongsTo(User::class);
    }
}
