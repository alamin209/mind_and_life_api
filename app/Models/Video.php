<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\ArticleTag;
class Video extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function video_category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function video_tags(){

        return $this->hasMany(ArticleTag::class,'video_id','id');

    }

    public function user_log_details(){
        return $this->hasMany(ArticleUser::class,'video_id','id');
    }
}
