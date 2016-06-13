<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Node
{
    protected $table = 'menu_items';

    protected $fillable = [ 'menu_id', 'category_id', 'page_id' ];

    public $timestamps = false;

    public function menu () {
    	return $this->belongsTo('App\Models\Menu');
    }

    public function category () {
    	return $this->belongsTo('App\Models\Category');
    }

    public function page () {
    	return $this->belongsTo('App\Models\Page');
    }

}
