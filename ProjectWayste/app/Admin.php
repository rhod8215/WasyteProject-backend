<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = 'admin';
    protected $fillable = ['firstname', 'lastname','phone_number', 'users_id', 'sector_id'];
}
