<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = 'customer';
    protected $fillable = ['firstname', 'lastname', 'address', 'phone_number', 'type', 'users_id'];
}
