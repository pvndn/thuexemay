<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Models\Order;

class OrderController extends Controller
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

    public function order() {
    	if( \Request::ajax() ) {
    		$name = \Request::get('name');
    		$email = \Request::get('email');
    		$phone = \Request::get('phone');
    		$message = \Request::get('message');
    		$carriage_id = \Request::get('carriage_id');

    		$carriage = \App\Models\Carriage::find($carriage_id);

    		if(!$carriage) {
    			return \Response::json([
    					'success'=>false, 
    					'errors' => 'Hệ thống không tìm thấy những gì bạn cần.'
    				]);
    		}

    		$messages = [
			    'required' 	=> 'Vui lòng nhập vào trường này.',
			    'email'    	=> 'Địa chỉ e-mail chưa đúng định dạng.',
			    'regex' 	=> 'Số điện thoại chưa đúng định dạng'
			];

    		$validator = Validator::make(\Request::all(), [
    			'name' 	=> 'required|min:3',
    			'email' => 'required|min:3|email',
    			'phone' => 'required|regex:/^0[0-9]{9,10}$/',

    		], $messages);

    		if($validator->fails()) {
    			return \Response::json([
    					'success'=>false, 
    					'errors' => $validator->errors()->toArray()
    				]);
    		}


    		$order = Order::create(\Request::all());


			return \Response::json(['success'=>true, 'id' => $order->id ]);

        }
    }

    public function orderPage($id) {
        $order = Order::find($id);

        $setting = \App\Models\Setting::first();

        \Mail::send('auth.emails.cart', ['data' => $order, 'setting' => $setting], function ($message) use ($order, $setting) {
            $message->to($order->email, $order->name)->subject('Thông tin đặt thuê xe!');
        });

        \Mail::send('auth.emails.sendAdmin', ['data' => $order], function ($message) use ($order, $setting) {
            $message->from($order->email, 'Thông tin đặt xe từ '.$order->name);

            $message->to('luxurysp.info@gmail.com', 'thuexemayphuongbinh.com')->subject('Thông tin đặt thuê');
        });
        
        $setting = $this->setting;
        $menuItem = $this->menuItem;
        $footerItem = $this->footerItem;
        $gallery = $this->gallery;
        if(!$order) abort(404);
        return view('site.order', compact('menuItem', 'gallery', 'footerItem', 'order', 'setting'));
    }
}
