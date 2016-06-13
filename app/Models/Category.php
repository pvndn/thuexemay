<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class Category extends Node
{
    protected $table = 'categories';

    protected $fillabe = [
    	'name', 'slug', 'sort_order', 'format',
    	'set_title', 'meta_desc', 'meta_key', 'publish'
    ];

    public function news () {
        return $this->hasMany('\App\Models\News');
    }

    public function carriages () {
        return $this->hasMany('\App\Models\Carriage');
    }

    public function menuItem () {
        return $this->hasOne('\App\Models\MenuItem');
    }

    public function updateOrder ( $orderCategory ) {
    	$orderCategory = $this->findOrFail($orderCategory);
    	$this->makeChildOf($orderCategory);
    }

    public function zoneName () {
    	return str_repeat('-', $this->depth * 4). ' ' . $this->name;
    }

    public function setSlugAttribute ( $string ) {
    	$slug = str_slug( $string );
    	$this->attributes['slug'] = $slug;
    }

}
