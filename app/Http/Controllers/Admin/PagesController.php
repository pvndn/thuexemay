<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Page;

class PagesController extends Controller
{
    protected $page;
    protected $formatArray = [ 'contact' ];

    public function __construct ( Page $page ) {
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page->all();
        return view('administrator.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderPage = $this->__orderPage();

        return view('administrator.pages.create', compact('orderPage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        }

        if( $request->format && !in_array($request->format, $this->formatArray) ) {
            return redirect()->back()->withErrors(['format' => 'format incorrect!'])->withInput();
        }

        $page = $this->page->create($input);

        $this->updatePageOrder( $page, $request);

        return redirect()->route('admin.page.show',$page->id)->with([
            'messages' => 'Add new page success',
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
        $page = $this->page->find($id);

        return view('administrator.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->page->find($id);
        $orderPage = $this->__orderPage();
        return view('administrator.pages.edit', compact('page', 'orderPage'));
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
        $page = $this->page->find($id);
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        }

        if( $request->format && !in_array($request->format, $this->formatArray) ) {
            return redirect()->back()->withErrors(['format' => 'format incorrect!'])->withInput();
        }

        if( $response = $this->updatePageOrder( $page, $request )) {
            return $response;
        }
        
        $page->update($input);

        return redirect()->route('admin.page.show',$page->id)->with([
            'messages' => 'Update page success',
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
        $page = $this->page->findOrFail($id);
        
        foreach( $page->children as $child ) {
            $child()->makeRoot();
        }

        $page->delete();

        return redirect()->route('admin.page.index')->with([
            'messages' => 'Delete page success',
            'type'  => 'success'
        ]);
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $page = $this->page->find($id);
            $page->publish = $publish;
            $page->save();

            return 'Publish update page success';
        }
    }

    private function __orderPage () {
        return $this->page->orderBy('lft', 'asc')->get();
    }

    private function updatePageOrder( page $page, Request $request ) {
        if( $request->has('parent_id') ) {
            try {
                $page->updateOrder( $request->parent_id );
            } catch ( MoveNotPossibleException $e ) {
                return redirect()->back()->with([
                    'messages' => 'Unable to make subpages',
                    'type'  => 'error'
                ]);
            }
        }
    }
}
