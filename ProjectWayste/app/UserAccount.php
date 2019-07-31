<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'type', 'active_status'];
}
