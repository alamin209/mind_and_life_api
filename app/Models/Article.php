<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\ArticleTag;
use App\Models\ArticleUser;
class Article extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function author(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function article_category(){
        return $this->belongsTo(Category::class,'category_id','id')->where('type','article');
    }
    public function user_log_details(){
        return $this->hasMany(ArticleUser::class,'article_id','id');
    }

    public function all_article(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function article_tags(){

        return $this->hasMany(ArticleTag::class,'article_id','id');

    }
    public function video_tags(){

        return $this->hasMany(ArticleTag::class,'video_id','id');

    }



}
