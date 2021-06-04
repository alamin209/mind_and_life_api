<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TermsNCondition extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'Terms and Condition';
    protected $guarded = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This terms and condition has been {$eventName}";
    }
}
