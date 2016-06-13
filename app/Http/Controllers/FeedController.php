<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FeedController extends Controller
{
    public function generate()
    {

        //$setting = \App\Setting::first();
        $feed = \App::make('feed');
        //$feed->setCache(60, 'laravelFeedKey');
        if (!$feed->isCached())
	    {
        	$posts = \App\Models\News::latest()->take(20)->get();

	       	$feed->title = 'Phương Bình, cho thuê xe máy Đà Nẵng';
	       	$feed->description = 'Phương Bình, cho thuê xe máy Đà Nẵng';
	       	$feed->logo = 'http://yoursite.tld/logo.jpg';
	       	$feed->link = url('/');
	       	$feed->setDateFormat('datetime');
	       	$feed->pubdate = '2016-05-25 09:32:29';
	       	$feed->lang = 'en';
	       	$feed->setShortening(true);
	       	$feed->setTextLimit(100);

	       	foreach ($posts as $post)
	       	{
	       		$feed->link = route('client.posts', [ $post->category->slug, $post->slug ]);
	       		$feed->image = ['url'=>$post->image, 'link' => $post->image];
	       		$enclosure = ['url'=>$post->image];
	           	$feed->add($post->name, 'Phương Bình', 
	           				route('client.posts', [ $post->category->slug, $post->slug ]),
	           				$post->created_at, str_limit($post->content,350), $post->content, $enclosure);
	       	}

	    }
		
		return $feed->render('rss');
    }
}
