<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use App\User;
class LoginHistory extends Model
{
    use  Notifiable,  LogsActivity;

    protected static $logFillable = true;
    protected static $logAttributes  =true;
    protected $guarded = [];

    protected static $logName = 'Login History';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This History Model has been {$eventName}";
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

}
