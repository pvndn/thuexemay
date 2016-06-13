<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class Page extends Node
{
    protected $table = 'pages';

    protected $fillabe = [
    	'name', 'slug', 'sort_order', 'image', 'content',
    	'set_title', 'meta_desc', 'meta_key', 'publish', 'format'
    ];

    public function menuItem () {
        return $this->hasOne('\App\Models\MenuItem');
    }
    
    public function updateOrder ( $orderPage ) {
    	$orderPage = $this->findOrFail($orderPage);
    	$this->makeChildOf($orderPage);
    }

    public function zoneName () {
    	return str_repeat('-', $this->depth * 4). ' ' . $this->name;
    }

    public function setSlugAttribute ( $string ) {
    	$slug = str_slug( $string );
    	$this->attributes['slug'] = $slug;
    }

}
