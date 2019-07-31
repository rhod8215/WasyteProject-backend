<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $table = 'company_and_lgu';
    protected $fillable = ['sector_name', 'sector_location','created_on', 'sector_type'];
}
