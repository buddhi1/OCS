<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custody extends Model
{
    protected $fillable = [
    						'child_id',
    						'caregiver_id'
    						];
}
