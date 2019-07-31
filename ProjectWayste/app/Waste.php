<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $table = 'waste_type';
    protected $fillable = ['waste_name'];
}
