<?php

namespace App\Models;

use \Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [ 
    	'name', 'slug', 'publish', 'image', 'content', 'category_id',
    	'set_title', 'meta_key', 'meta_desc'
    ];

    public function category () {
    	return $this->belongsTo('App\Models\Category');
    }

    public function setSlugAttribute ( $string ) {
    	$slug = str_slug( $string );
    	$this->attributes['slug'] = $slug;
    }

    public function getCreatedAtAttribute( $value ) {
    	return Carbon::parse($value)->format('d/m/Y H:i');
    }
}
