<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $menuItem;
    protected $gallery;
    protected $setting;

    public function __construct() {
        $this->menuItem = \App\Models\MenuItem::where('menu_id', 1)->get()->toHierarchy();
        $this->footerItem = \App\Models\MenuItem::where('menu_id', 2)->get()->toHierarchy();
        $this->gallery = \App\Models\Gallery::orderByRaw("RAND()")->take(6)->get();
        $this->setting = \App\Models\Setting::first();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {

    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $slider = \App\Models\Slider::where('publish', 0)->get();
        $news = \App\Models\News::where('publish', 0)->take(4)->get();
        $motoCate = \App\Models\Category::where('publish', 0)->where('format', 'motorbike')->get();
        $gallery = $this->gallery;
        $menuItem = $this->menuItem;
        $footerItem = $this->footerItem;
        $setting = $this->setting;
        return view('site.index', compact('slider','news', 'motoCate', 'gallery', 'menuItem', 'footerItem', 'setting'));
    }

    public function category( $slug ) {
        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $footerItem = $this->footerItem;
        $gallery = $this->gallery;
        $category = \App\Models\Category::where('slug', $slug)->first();
        if(!$category) {
            $page = \App\Models\Page::where('slug', $slug)->first();
        }

        if( $category ) {
            $template = $category->format;
            switch ( $template ) {
                case 'news':
                    $news = $category->news()->where('publish', 0)->paginate(16);
                    return view('site.news', compact('menuItem', 'gallery', 'news', 'footerItem', 'setting', 'category'));
                    break;
                
                case 'gallery':
                    $galleries = \App\Models\Gallery::all();
                    return view('site.gallery', compact('menuItem', 'gallery', 'galleries', 'category', 'footerItem', 'setting'));
                    break;
                
                case 'motorbike':
                    $categories = $category->select('id')->whereBetween('lft',[$category->lft, $category->rgt])->get();
                    $motoCate = \App\Models\Carriage::whereIn('category_id', $categories)->orderBy('id', 'desc')->get();
                    return view('site.moto', compact('menuItem', 'gallery', 'motoCate', 'category', 'footerItem', 'setting'));
                    break;
                
                default:
                    $news = $category->news()->paginate(16);
                    return view('site.news', compact('menuItem', 'gallery', 'news', 'category', 'footerItem', 'setting'));
                    break;
            }
        } elseif( $page ) {
            $template = $page->format;
            switch ( $template ) {
                case 'contact':
                    return view('site.contact', compact('menuItem', 'gallery', 'page', 'footerItem', 'setting'));
                    break;
                default:
                    return view('site.page', compact('menuItem', 'gallery', 'page', 'footerItem', 'setting'));
                    break;
            }
            
        } else {
            abort(404);
        }
    }

    public function single( $category, $post ) {
        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $footerItem = $this->footerItem;
        $gallery = $this->gallery;

        $whereCategory = \App\Models\Category::where('slug', $category)->first();
        if( !$whereCategory ) abort(404);
        
        $template = $whereCategory->format;
        switch ( $template ) {
            case 'news':
                $post = \App\Models\News::where('slug', $post)->first();
                if( !$post ) abort(404);
                return view('site.single', compact('menuItem', 'gallery', 'post', 'footerItem', 'setting'));
                break;
            
            case 'motorbike':
                $post = \App\Models\Carriage::where('slug', $post)->first();
                if( !$post ) abort(404);
                return view('site.single-moto', compact('menuItem', 'gallery', 'post', 'footerItem', 'setting'));
                break;
            
            default:
                return view('site.single', compact('menuItem', 'gallery', 'post', 'footerItem', 'setting'));
                break;
        }
    }

}
