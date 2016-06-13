<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [ 'name', 'publish' ];

    public function menuItems () {
    	return $this->hasMany('App\Models\MenuItem');
    }

}
