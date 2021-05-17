<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementLog extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'advertisement_logs';
}
