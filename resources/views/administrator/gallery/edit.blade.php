@extends('administrator.layouts.master')

@section('content')
	<div class="page page-gallery">
		<div class="pageheader">
		    <h2>Gallery</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Gallery</a>
		            </li>
		            <li>
		                <a href="">Edit image</a>
		            </li>
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>
		<div class="row">
			<form action="{{ route('admin.gallery.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>Main </strong>Form</h1>
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
		                <div class="tile-body">
	                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="exampleInputName">Title</label>
	                            <input type="text" class="form-control" name="title" placeholder="Enter name category" value="{{ old('title', $slider->title) }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Description</label>
	                            <textarea class="form-control" name="desc">{{ old('desc', $slider->desc) }}</textarea>
	                        </div>
	                        <div class="form-group">
	                        	<span class="input-group-btn">
							        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
							          <i class="fa fa-picture-o"></i> Choose
							        </a>
							    </span>
							    <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $slider->image }}">
	                        </div>
	                    	<button type="submit" class="btn btn-rounded btn-primary btn-sm pull-right">Save</button>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
                <div class="col-md-6">
                	<img id="holder" style="width: 100%;" src="{{ $slider->image }}">
                </div>
			</form>
		</div>		
	</div>
@endsection

@push('scripts')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush