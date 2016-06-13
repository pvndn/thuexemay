@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Motorbike</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">motorbike</a>
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
	            <h1 class="custom-font"><strong>Motorbike</strong> show</h1>
	            <ul class="controls">
	                <li>
	                    <a role="button" tabindex="0" href="{{ route('admin.carriage.create') }}"><i class="fa fa-plus mr-5"></i> Add news motorbike</a>
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
	        	<div class="col-md-9 col-md-offset-1">
                    <h3 class="animated bounceIn" style="text-transform: uppercase; text-align: center; color: #ed1b2f;">
                        <span>Nổi bật</span>
                    </h3>
		        	<div class="row">
		        		@if(!empty($motorbike->albums))
				        <div id="thumbnail-slider" style="display:none;">
				        	<div class="inner">
                            	<ul>
		        				@foreach($motorbike->albums as $album)
					            	<li>
	                                    <a class="thumb" href="{{ $album->photo }}"></a>
	                                </li>
				            	@endforeach
				            	</ul>
				            </div>
                        	<div id="closeBtn">CLOSE</div>
			            </div>
	                    <ul id="myGallery">
	                    	@foreach($motorbike->albums as $album)
	                        	<li><img src="{{ $album->photo }}" /></li>
	                        @endforeach
	                    </ul>
				        @endif	
			            <div class="col-md-12" style="padding: 10px;">
		                    <h3 class="animated bounceIn" style="text-transform: uppercase; text-align: center; color: #ed1b2f;">
		                        <span>Mô tả</span>
		                    </h3>
			            	{!! $motorbike->content !!}
			            </div>	
		        	</div>
	        	</div>
			    <div class="clearfix"></div>
			    <div class="col-md-6 col-md-offset-3">
				    <a href="{{ route('admin.carriage.index') }}" class="btn btn-success">Hoàn thành</a>
				    <a href="{{ route('admin.carriage.edit', $motorbike->id) }}" class="btn btn-primary">Sửa chữa</a>
			    </div>
			    <div class="clearfix"></div>
	        </div>
	        <!-- /tile body -->
	        <div id='noti' style='display:none'></div>
	    </section>
	</div>
@endsection
