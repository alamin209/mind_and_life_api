<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\User;
use App\Models\Category;
use App\Models\ArticleTag;
use App\Models\ArticleImages;
class Article extends Model
{
    use  LogsActivity;

    protected static $logUnguarded = true;
     protected static $logFillable = true;
    protected static $logName = 'Article';
    protected $guarded=[];



    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Ip Address   has been {$eventName}";
    }


    public function articleImages(){
        return $this->hasMany(ArticleImage::class ,'article_id','id');
    }

    public function author(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function article_tags(){
        return $this->hasMany(ArticleTag::class , 'article_id','id');
    }
}
