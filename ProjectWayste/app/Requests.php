<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';
    protected $fillable = ['requested_by', 'collected_by', 'collected_at', 'payment', 'is_accepted', 'is_completed'];
}
