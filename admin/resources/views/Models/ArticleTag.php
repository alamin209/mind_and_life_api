<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ArticleTag extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'Article Tag';
    protected $guarded = [];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Article Tag   has been {$eventName}";
    }

}
