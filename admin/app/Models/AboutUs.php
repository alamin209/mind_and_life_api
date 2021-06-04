<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AboutUs extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'About US';
    protected $guarded = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This about us has been {$eventName}";
    }
}
