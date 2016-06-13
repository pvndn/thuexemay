<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    protected $category;
    protected $formatArray = [ 'news', 'motorbike', 'gallery' ];

    public function __construct ( Category $category ) {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        return view('administrator.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderCategory = $this->__orderCategory();

        return view('administrator.categories.create', compact('orderCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();

        if( $request->slug != '' ) {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        }

        if( $request->format && !in_array($request->format, $this->formatArray) ) {
            return redirect()->back()->withErrors(['format' => 'format incorrect!'])->withInput();
        }

        $category = $this->category->create($input);

        $this->updateCategoryOrder( $category, $request);

        return redirect()->route('admin.category.index')->with([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $orderCategory = $this->__orderCategory();
        return view('administrator.categories.edit', compact('category', 'orderCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        }

        if( $request->format && !in_array($request->format, $this->formatArray) ) {
            return redirect()->back()->withErrors(['format' => 'format incorrect!'])->withInput();
        }

        if( $response = $this->updateCategoryOrder( $category, $request ) ) {
            return $response;
        }

        $category->update($input);

        return redirect()->route('admin.category.index')->with([
            'messages' => 'Update category success',
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
        $category = $this->category->findOrFail($id);
        
        foreach( $category->children as $child ) {
            $child()->makeRoot();
        }

        $category->delete();

        return redirect()->route('admin.category.index')->with([
            'messages' => 'Delete category success',
            'type'  => 'success'
        ]);
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $category = $this->category->find($id);
            $category->publish = $publish;
            $category->save();

            return 'Publish update category success';
        }
    }

    private function __orderCategory () {
        return $this->category->orderBy('lft', 'asc')->get();
    }

    private function updateCategoryOrder( Category $category, Request $request ) {
        if( $request->has('parent_id') ) {
            try {
                $category->updateOrder( $request->parent_id );
            } catch ( MoveNotPossibleException $e ) {
                return redirect()->back()->with([
                    'messages' => 'Unable to make subcategories',
                    'type'  => 'error'
                ]);
            }
        }
    }
}
