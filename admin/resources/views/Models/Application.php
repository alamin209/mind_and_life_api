<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
