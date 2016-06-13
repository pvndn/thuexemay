@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Menu</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Menu</a>
		            </li>
		            <li>
		                <a href="">Add item</a>
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
	            <h1 class="custom-font"><strong>Add item</strong> menu</h1>
				<i class="fa fa-spinner fa-spin load-delay"></i>
	            <ul class="controls">
	                <li>
	                    <a role="button" tabindex="0" href="{{ route('admin.page.create') }}"><i class="fa fa-plus mr-5"></i> Add Page page</a>
	                </li>
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
	    </section>
        <!-- /tile header -->
        <div class="row">
        	<div class="col-md-4">
		        <div class="tile-body p-0">
	                <div role="tabpanel">
	                    <form action="{{ route('admin.menu.postadd') }}" method="POST" id="form-add-item">
	                    	{{ method_field('POST') }}
	                    	{{ csrf_field() }}
	                    	<div class="tile-body p-0">
                                <div class="panel-group icon-plus" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default panel-transparent">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                    <span><i class="fa fa-minus text-sm mr-5"></i> Category</span>
                                                    <span class="badge pull-right bg-lightred">{{ $categories->count() }}</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-no-border m-0">
                                                    <tbody>
                                                    @foreach( $categories as $id => $name )
                                                    <tr>
                                                        <td>
					                                        <label class="checkbox checkbox-custom-alt">
				                                                <input type="checkbox" name="category[]" value="{{ $id }}" id="c{{ $id }}" {{ in_array($id, $cate_ar_id) ? 'disabled=true' : '' }}><i></i>
				                                            </label>
                                                        </td>
                                                        <td>{{ $name }}</td>
                                                        <td><i class="fa fa-caret-up text-success"></i></td>
                                                    </tr>
		                                			@endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default panel-transparent">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <span><i class="fa fa-minus text-sm mr-5"></i> Page</span>
                                                    <span class="badge pull-right bg-lightred">{{ $pages->count() }}</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-no-border m-0">
                                                    <tbody>
                                                    @foreach( $pages as $id => $name )
                                                    <tr>
                                                        <td>
					                                        <label class="checkbox checkbox-custom-alt">
				                                                <input type="checkbox" name="page[]" value="{{ $id }}" id="p{{ $id }}" {{ in_array($id, $page_ar_id) ? 'disabled=true' : '' }}><i></i>
				                                            </label>
                                                        </td>
                                                        <td>{{ $name }}</td>
                                                        <td><i class="fa fa-caret-up text-success"></i></td>
                                                    </tr>
		                               	 			@endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
		                        	<button class="btn btn-primary pull-left" style="margin: 10px 0;">Add Item</button>
		        					
                                </div>
                            </div>
		                </form>
	                </div>
	            </div>
	        </div>


	        <div class="col-md-8">
	        	<div class="dd nestable-tree" id="nestable">
		        	<ol class="dd-list">
		        		@foreach($menuItem as $item)

		        			{!! renderNode($item) !!}

		        		@endforeach
		        	</ol>
		        </div>
	        </div>
        </div>
        <div class="clearfix"></div>
	    <div id='noti' style='display:none'></div>
	</div>
@endsection

@push('css')
    <link rel="stylesheet" href="/assets/admin/css/jquery.nestable.min.css">

	<style>
		.content {
			font-family: Georgia, serif;
			font-size: 15px;
			line-height: 28px;
		}

		#noti {
		    width:300px;
		    height:20px;
		    height:auto;
		    position:absolute;
		    left:60%;
		    margin-left:-100px;
    		top: 15px;
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
</style>
@endpush

@push('scripts')
    <script src="/assets/admin/js/jquery.nestable.min.js"></script>
	
	<script>
        $(function () {
            $('.dd').nestable({
                callback: function(){
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("admin.menu.postupdate") }}',
                        data: JSON.stringify($('.dd').nestable('asNestedSet')),
                        contentType: "json",
                        headers: {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                        },
                        success: function (result) {
							$('#noti').html(result.message);
        					$('#noti').fadeIn(100).delay(3000).fadeOut(400);
                        },
                        error:  function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                }
            });
        });
    </script>

	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			$('.load-delay').hide();
			$('#form-add-item').on('submit', function () {
			    var category = [];
			    $("input[name='category[]']:checked").each(function(){
			      category.push($(this).val());
			    });

			    var page = [];
			    $("input[name='page[]']:checked").each(function(){
			      page.push($(this).val());
			    });
		    	
				$.post(
					$(this).prop('action'),
					{
						"_token": "{{ csrf_token() }}",
						"category": category,
						"page": page,
						"id": "{{ $menuId }}"
					},
					function (data) {
						$('.load-delay').show(200);
						setTimeout(function () {
							$('.load-delay').hide(200);
							if(data.category || data.page) {
								$.each(data, function() {
								  	$.each(this, function(k, v) {
								  		if(v.id) {
								  			$('ol.dd-list').append('<li class="dd-item" data-id="'+v.id+'" data-order="'+v.order+'"><div class="dd-handle">'+v.name+'</div></li>');
								  		}
								  	});
								  	return true;
								});
							}

							if(data.category || data.page) {
								$.each(data.category, function(k, v) {
									if($.inArray(v.id, $("input[name='category[]']"))) {
							  			$("#c"+v.id).prop('disabled', true);
							  			$("#c"+v.id).prop('checked', false);
							  		}
								});
								$.each(data.page, function(k, v) {
									if($.inArray(v.id, $("input[name='page[]']"))) {
							  			$("#p"+v.id).prop('disabled', true);
							  			$("#p"+v.id).prop('checked', false);
							  		}
								});
							}

							$('#noti').html(data.message);
        					$('#noti').fadeIn(100).delay(3000).fadeOut(400);
						}, 5000);
					}, 'json'
				);
				return false;
			});
		});
	</script>

	
@endpush
