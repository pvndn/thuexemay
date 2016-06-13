<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['title', 'description', 'keyword', 
    						'dribbble', 'google', 'flickr', 'twitter', 
    						'facebook', 'email', 'address', 'phone', 'content', 'logo', 'logo_footer', 'name'];

    public $timestamps = false;
}
