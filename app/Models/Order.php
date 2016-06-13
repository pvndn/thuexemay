<?php

namespace App\Models;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [ 
    	'name', 'email', 'phone', 'message', 'carriage_id', 'status'
    ];

    public function carriage () {
    	return $this->belongsTo('App\Models\Carriage');
    }
    
    public function getCreatedAtAttribute( $value ) {
    	return Carbon::parse($value)->format('d/m/Y H:i');
    }
}
