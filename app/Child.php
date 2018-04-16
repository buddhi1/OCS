<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['first_name', 
    						'last_name', 
    						'cps_no',
    						'type',
    						'caseworker_id',
    						'advocate_id',
    						'dob',
    						'school_id',
    						'class',
    						'address1',
    						'city',
    						'zip',
    						'county'
    						];
}
