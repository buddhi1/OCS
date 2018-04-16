<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caseworker extends Model
{
    //
     protected $fillable = ['first_name', 
    						'last_name',  						
    						'phone',
    						'address',
    						'zip_code',
    						'country',
    						'email'
    						];
}
