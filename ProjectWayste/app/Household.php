<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    public $timestamps = false;
    protected $table = 'household';
    protected $fillable = ['firstname', 'lastname', 'address', 'phone_number', 'type', 'users_id','sector_id' ,'marital_status', 'number_of_children', 'gender', 'bio','job_description'];
}
