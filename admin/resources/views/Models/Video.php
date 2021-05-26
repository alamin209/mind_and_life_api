<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\User;
use App\Models\Category;
use App\Models\ArticleTag;
class Video extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
     protected static $logFillable = true;
    protected static $logName = 'Article';
    protected $guarded=[];



    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Article  has been {$eventName}";
    }


    public function author(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function article_tags(){
        return $this->hasMany(ArticleTag::class , 'video_id','id');
    }
}
