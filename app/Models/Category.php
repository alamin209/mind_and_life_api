<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Video;
class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function all_articles(){
        return $this->hasMany(Article::class ,'category_id','id');

    }
    public function all_videos(){
        return $this->hasMany(Video::class ,'category_id','id');
    }
}
