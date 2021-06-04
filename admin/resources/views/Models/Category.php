<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{

    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'Category';
    protected $guarded = [];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Ip Address   has been {$eventName}";
    }


}
