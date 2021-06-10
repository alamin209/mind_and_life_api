<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Occupation extends Model
{
    use  Notifiable,  LogsActivity;

    protected static $logFillable = true;
    protected static $logAttributes  =true;
    protected $guarded = [];

    protected $table="occupations";

    protected static $logName = 'Occupation';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Occupation Model has been {$eventName}";
    }
}
