<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

use App\Models\News;

class NewsController extends Controller
{
    protected $news;

    public function __construct( News $news ) {
        $this->news = $news;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->news->all();
        return view('administrator.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        return view('administrator.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        };

        $post = $this->news->create($input);

        return redirect()->route('admin.news.show', $post->id)->with([
            'messages' => 'Add category success',
            'type'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->news->find($id);
        return view('administrator.news.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->news->find($id);
        $categories = $this->categories();
        return view('administrator.news.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->news->find($id);

        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        };

        $post->update($input);

        return redirect()->route('admin.news.show', $post->id)->with([
            'messages' => 'Update post success',
            'type'  => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->news->find($id);
        $post->delete();
        return redirect()->route('admin.news.index')->with([
            'messages' => 'Delete post success',
            'type'  => 'success'
        ]);
    }

    private function categories() {
        return \App\Models\Category::orderBy('lft', 'asc')->lists('name', 'id');
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $new = $this->news->find($id);
            $new->publish = $publish;
            $new->save();

            return 'Publish update news post success';
        }
    }
}
