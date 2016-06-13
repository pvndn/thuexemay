<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
	protected $orders;

	public function __construct(Order $orders) {
		$this->orders = $orders;
	}

    public function index () {
    	$orders = $this->orders->select('id', 'name', 'email', 'phone', 'status', 'carriage_id', 'created_at')->get();

    	return view('administrator.orders.index', compact('orders'));
    }

    public function show( $id ) {
    	$order = $this->orders->find($id);
    	dd($order);
    	return view('administrator.orders.index', compact('order'));
    }


    public function update( Request $request ) {
    	if($request->get('trans')) {
    		$transId = $request->get('trans');

	    	$order = $this->order->find($transId);

	    	$flag = 1;
	    	
	    	$action = $request->get('action');

	    	if($action == 'unconfirm') {
	    		$order->update([
		    		'status' => 0
		    	]);

		    	return redirect()->back()->with(['messages' => 'Đã xác nhận chưa thanh toán tiền.', 'type' => 'success']);

	    	} elseif($action == 'unpublish') {

	    		$flag = 3;

	    		$order->update([
		    		'status' => 3
		    	]);

		    	if(\Response::json(['success' => true], 200)) {
		            \Mail::send('auth.emails.noti', ['data' => $order, 'flag' => $flag], function ($message) use ($transaction) {
		                $message->to($order->email, $order->name)->subject('Thông báo từ luxury.com!');
		            });
	    			return redirect()->route('admin.orders.index')->with(['messages' => 'Đã hủy đơn hàng thành công.', 'type' => 'success']);
		        }
	    	}

	    	$order->update([
	    		'status' => 1
	    	]);
	    	if(\Response::json(['success' => true], 200)) {
	            \Mail::send('auth.emails.noti', ['data' => $order, 'flag' => $flag], function ($message) use ($transaction) {
	                $message->to($order->email, $order->name)->subject('Thông báo từ luxury.com!');
	            });
	    		return redirect()->back()->with(['messages' => 'Đã xác nhận thanh toán tiền.', 'type' => 'success']);
	        }
    	} elseif($request->get('order')) {
    		$ordersId = $request->get('order');
	    	$order = $this->orders->find($ordersId);
	    	$action = $request->get('action');
	    	if($action == 'unconfirm') {
	    		$order->update([
		    		'status' => 0
		    	]);
		    	return redirect()->back()->with(['messages' => 'Đã xác nhận chưa giao hàng.', 'type' => 'success']);
	    	}
	    	$order->update([
	    		'status' => 1
	    	]);
	    	return redirect()->back()->with(['messages' => 'Đã xác nhận giao hàng.', 'type' => 'success']);
    	}
    }

}
