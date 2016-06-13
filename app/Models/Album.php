<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    
   protected $table = 'albums';

    protected $fillable = [ 'photo', 'carriages_id' ];

    public function carriages () {
    	return $this->belongsTo('App\Models\Carriage');
    }
}
