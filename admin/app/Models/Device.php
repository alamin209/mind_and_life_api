<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    protected $guarded = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Ip Address   has been {$eventName}";
    }

}
