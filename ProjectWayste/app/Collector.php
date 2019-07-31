<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    public $timestamps = false;
    protected $table = 'collector';
    //protected $fillable = ['firstname', 'lastname', 'phone_number','address','earnings', 'type', 'active_request', 'users_id'];
    protected $fillable = ['firstname', 'lastname', 'phone_number','address','active_status','earnings', 'type', 'active_request', 'users_id', 'sector_id', 'sign_up_status','drivers_license_img','marital_status', 'number_of_children', 'gender', 'bio','job_description'];

}
