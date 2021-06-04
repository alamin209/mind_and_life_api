<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\User;
use App\Models\Article;

class ArticleUser extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
    protected static $logFillable = true;
    protected static $logName = 'article_users';
    protected $guarded = [];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Ip Address   has been {$eventName}";
    }


    public function author()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function article()
    {

        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
