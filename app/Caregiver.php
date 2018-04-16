<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    protected $fillable = [  'first_name',
    						 'last_name', 
    						 'address', 
    						 'county',
    						 'city', 
    						 'zipcode',  
    						 'cpa',
    						 'caseworker_name',
    						 'license_type',
    						 'license_no',
    						 'license_level',
    						 'max_fosterchild_no',
    						 'respite',
    						 'bio_children_no',
    						 'kinship_children_no',
    						 'foster_children_no'
    						 ];
}
