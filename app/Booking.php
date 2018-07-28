<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'start', 'end', 'time','status','price','user_id'
    ];
    
}
