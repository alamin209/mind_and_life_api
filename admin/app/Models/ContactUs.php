<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContactUs extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'Contact US';
    protected $guarded = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This contact us has been {$eventName}";
    }
}
