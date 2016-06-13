@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Page</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Page</a>
		            </li>
		            <li>
		                <a href="">show</a>
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
	            <h1 class="custom-font"><strong>Page</strong> show</h1>
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
	        <!-- /tile header -->

	        <!-- tile body -->
	        <div class="tile-body">
        		<div class="row" id="baner-image">
        			<img src="{{ $page->image }}" style="width: 100%;" id="showImage">
        		</div>
	        	<div class="col-md-9 col-md-offset-1">
			        <h3 class="custom-font">{{ $page->name }}</h3>
		        	<div class="row">
			            <div class="col-md-12 content">
			            	{!! $page->content !!}
			            </div>	
		        	</div>
	        	</div>
			    <div class="clearfix"></div>
			    <div class="col-md-6 col-md-offset-3">
				    <a href="{{ route('admin.page.index') }}" class="btn btn-success">Hoàn thành</a>
				    <a href="{{ route('admin.page.edit', $page->id) }}" class="btn btn-primary">Sửa chữa</a>
			    </div>
			    <div class="clearfix"></div>
	        </div>
	    </section>
	</div>
@endsection

@push('css')
	<style>
		.content {
			font-family: Georgia, serif;
			font-size: 15px;
			line-height: 28px;
		}
	</style>
@endpush

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function($) {
			var url = $('#baner-image img').attr('src');
			$('img#showImage').css('display','none');

			$('#baner-image').css({
				'background-image': 'url('+ url +')',
				'background-size': 'cover',
				'background-repeat': 'no-repeat',
				'background-position': 'center center',
				'width': '100%',
				'height': '25em',
			});
		});
	</script>
@endpush