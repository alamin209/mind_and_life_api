<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class CategoryLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'categories' => 'array'
    ];


    public function getCategory()
    {
        // $services       = [];
        $category_obj     = new Category();
        $category         = $category_obj->whereIn('id', $this->categories)->get();
        return $category;
    }
}
