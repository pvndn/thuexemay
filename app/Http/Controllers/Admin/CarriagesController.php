<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Carriage;
use App\Models\Album;

class CarriagesController extends Controller
{
    protected $carriages;
    protected $album;

    public function __construct( Carriage $carriages, Album $album ) {
        $this->carriages = $carriages;
        $this->album = $album;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorbike = $this->carriages->all();
        return view('administrator.carriages.index', compact('motorbike'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        return view('administrator.carriages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        };

        $motorbike = $this->carriages->create($input);

        if($photos = $request->photo) {
            foreach ($photos as $photo) {
                if(!empty($photo)) {
                    $this->album->create([
                        'carriages_id' => $motorbike->id,
                        'photo' => $photo,
                    ]);
                }
            }
        }

        return redirect()->route('admin.carriage.show', $motorbike->id)->with([
            'messages' => 'Add motorbike success',
            'type'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $motorbike = $this->carriages->find($id);
        return view('administrator.carriages.show', compact('motorbike'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $motorbike = $this->carriages->find($id);
        $categories = $this->categories();
        return view('administrator.carriages.edit', compact('categories', 'motorbike'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $motorbike = $this->carriages->find($id);

        $input = $request->all();

        if($request->slug != '') {
            $input['slug'] = $request->slug;
        } else {
            $input['slug'] = $request->name; 
        };

        $motorbike->update($input);

        if($photos = $request->photo) {
            foreach ($photos as $photo) {
                if(!empty($photo)) {
                    $this->album->create([
                        'carriages_id' => $motorbike->id,
                        'photo' => $photo,
                    ]);
                }
            }
        }

        return redirect()->route('admin.carriage.show', $motorbike->id)->with([
            'messages' => 'Update motorbike success',
            'type'  => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $motorbike = $this->carriages->find($id);
        $motorbike->delete();
        return redirect()->route('admin.carriage.index')->with([
            'messages' => 'Delete motorbike success',
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

            $motorbike = $this->carriages->find($id);
            $motorbike->publish = $publish;
            $motorbike->save();

            return 'Publish update post success';
        }
    }

    public function album ( $id ) {
        if( \Request::ajax() ) {
            $album = $this->album->find($id);
            $album->delete();
            return 'Delete success an photo';
        }
    }
}
