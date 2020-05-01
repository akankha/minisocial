<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table='status';
    //
     function user(){
        return $this->belongsTo(User::class);
    }
}
