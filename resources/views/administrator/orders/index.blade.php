@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Orders</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">orders</a>
		            </li>
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>

		<section class="tile">
	       	@include('administrator.partials.flash')
	        <div class="tile-header dvd dvd-btm">
	            <h1 class="custom-font"><strong>orders post</strong> List</h1>
	            <ul class="controls">
	                <li class="dropdown">

	                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
	                        <i class="fa fa-cog"></i>
	                        <i class="fa fa-spinner fa-spin"></i>
	                    </a>

	                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
	                        <li>
	                            <a role="button" tabindex="0" class="tile-toggle">
	                                <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
	                                <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
	                            </a>
	                        </li>
	                        <li>
	                            <a role="button" tabindex="0" class="tile-refresh">
	                                <i class="fa fa-refresh"></i> Refresh
	                            </a>
	                        </li>
	                        <li>
	                            <a role="button" tabindex="0" class="tile-fullscreen">
	                                <i class="fa fa-expand"></i> Fullscreen
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </div>
	        <!-- /tile header -->

	        <!-- tile body -->
	        <div class="tile-body">
	            <div class="table-responsive">
	                <table class="table table-custom" id="editable-usage">
	                    <thead>
	                    <tr>
	                        <th width="100"></th>
	                        <th>Sản phẩm</th>
	                        <th>Name</th>
	                        <th>Phone</th>
	                        <th>Status</th>
	                        <th style="width: 150px;" >create at</th>
	                        <th>Action</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    @if( $orders )
	                    	@foreach( $orders as $order )
		                    	@if($order->status == 0)
		                    		<?php $class = '' ?>
		                    		<?php $status = 'Chờ xử lý' ?>
		                    	@endif
		                    	@if($order->status == 1)
		                    		<?php $class = 'class=success' ?>
		                    		<?php $status = 'Đã xử lý' ?>
		                    	@endif
		                    	@if($order->status == 2)
		                    		<?php $class = 'class=error' ?>
		                    		<?php $status = 'Bị hủy' ?>
		                    	@endif
		                    <tr {{ $class }}>
		                    	<td><img src="{{ $order->carriage->image }}" style="width: 100%;"></td>
		                    	<td>{{ $order->carriage->name }}</td>
		                        <td>{{ $order->name }}</td>
		                        <td>{{ $order->phone }}</td>
		                        <td>{{ $status }}</td>
		                        <td>{{ $order->created_at }}</td>
		                        <td class="action"><a href="{{ route('admin.orders.show', $order->id) }}">Show</a></td>
		                    </tr>
		                    @endforeach
		                @endif
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <!-- /tile body -->
	        <div id='noti' style='display:none'></div>
	    </section>
	</div>
@endsection

@push('css')
<style type="text/css" media="screen">
	#noti {
	    width:300px;
	    height:20px;
	    height:auto;
	    position:absolute;
	    left:60%;
	    margin-left:-100px;
	    bottom:0;
	    background-color: #383838;
	    color: #F0F0F0;
	    font-family: Calibri;
	    font-size: 20px;
	    padding:10px;
	    text-align:center;
	    border-radius: 2px;
	    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	}

	.success {
		background: #16a085;
	}

	.error {
		background: #e05d6f;
	}
</style>
@endpush

@push('scripts')

	<script type="text/javascript">
		var table = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "sort": false
        });
	</script>
	
	<script>
     //    $(document).ready(function() {
     //    	$('input[name=publish]').change(function(event) {
     //    		var cate_id;
     //    		cate_id = $(this).parent().find('input[name=publish]').attr('cate-id');
     //    		var url = base_url;
     //    		var data;
     //    		var value = $('input[name=publish]').attr("checked") ? 1 : 0;
     //    		if( value == 1 ) {
     //    			data = 1;
     //    		} else {
     //    			data = 0;
     //    		}
     //    		$.ajax({
     //    			url: '{{-- route("admin.orders.publish") --}}',
     //    			method: 'POST',
     //    			data: { 'publish': data, 'id': cate_id, '_token': $('meta[name="csrf-token"]').attr('content') },
     //    			success: function (result) {
     //    				$('#noti').html(result);
     //    				$('#noti').fadeIn(400).delay(3000).fadeOut(400);
					// }
     //    		});
     //    	});
     //    });
	</script>
@endpush