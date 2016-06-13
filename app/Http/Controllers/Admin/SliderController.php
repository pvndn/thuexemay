<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $slider;

    public function __construct( Slider $slider ) {
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->slider->all();
        return view('administrator.sliders.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->slider->create($request->only('title', 'desc', 'image'));

        return redirect()->route('admin.slider.index')->with([
            'messages' => 'Insert image success',
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
        $slider = $this->slider->find($id);
        return view('administrator.sliders.edit', compact('slider'));
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
        $slider = $this->slider->find($id);
        $slider->update($request->only('title', 'desc', 'image'));

        return redirect()->route('admin.slider.index')->with([
            'messages' => 'Update image success',
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
        $slider = $this->slider->find($id);
        $slider->delete();

        return redirect()->route('admin.slider.index')->with([
            'messages' => 'Delete image success',
            'type'  => 'success'
        ]);
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $slider = $this->slider->find($id);
            $slider->publish = $publish;
            $slider->save();

            return 'Publish update image success';
        }
    }

}
