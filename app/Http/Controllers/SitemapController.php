<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SitemapController extends Controller
{
    public function generate() {
	    $sitemap = \App::make("sitemap");
	    $sitemap->add(\URL::to('/'), '2016-04-20 06:41:16', '1.0', 'daily');
	    
	    $news = \App\Models\News::orderBy('created_at','desc')->get();
	    $newResult = array();
	    if(!empty($news)){
	        foreach ($news as $key => $value) {
	            $newResult[$value->id]['id'] = $value->id;
	            $newResult[$value->id]['category'] = $value->category->slug;
	            $newResult[$value->id]['slug'] = $value->slug;
	            $newResult[$value->id]['name'] = $value->name;
	            $newResult[$value->id]['updated_at'] = $value->updated_at;
	        }
	    }

	    foreach ($newResult as $key=>$value)
	     {
	        $sitemap->add(\URL::route('client.posts',[ $value['category'], $value['slug']]), $value['updated_at'], '1.0', 'daily');
	    }
	    
	 	//categories
	    $categories = \DB::table('categories')
	                ->select('*')
	                    ->orderBy('created_at','desc')
	                    ->get();
	    $categeoryResult = array();
	    if(!empty($categories)){
	        foreach ($categories as $key => $value) {
	            $categeoryResult[$value->id]['id'] = $value->id;
	            $categeoryResult[$value->id]['slug'] = $value->slug;
	            $categeoryResult[$value->id]['name'] = $value->name;
	            $categeoryResult[$value->id]['updated_at'] = $value->updated_at;
	        }
	    }

	    foreach ($categeoryResult as $key=>$value)
	     {
	        $sitemap->add(\URL::route('client.slug',[ 'slug' => $value['slug']]), $value['updated_at'], '1.0', 'daily');
	    }

	 	//page
	    $pages = \DB::table('pages')
	                ->select('*')
	                    ->orderBy('created_at','desc')
	                    ->get();
	    $pageResult = array();
	    if(!empty($pages)){
	        foreach ($pages as $key => $value) {
	            $pageResult[$value->id]['id'] = $value->id;
	            $pageResult[$value->id]['slug'] = $value->slug;
	            $pageResult[$value->id]['name'] = $value->name;
	            $pageResult[$value->id]['updated_at'] = $value->updated_at;
	        }
	    }

	    foreach ($pageResult as $key=>$value)
	     {
	        $sitemap->add(\URL::route('client.slug',[ 'slug' => $value['slug']]), $value['updated_at'], '1.0', 'daily');
	    }

	 	
	    /* show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf') */
	    return $sitemap->render('xml');
    }
}
