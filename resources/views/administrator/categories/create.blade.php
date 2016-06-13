@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Categories</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">categories</a>
		            </li>
		            <li>
		                <a href="">add new</a>
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
			<form action="{{ route('admin.category.store') }}" method="POST">
				{{ method_field('POST') }}
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
	                            <label for="exampleInputName">Name</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name category" value="{{ old('name') }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Slug</label>
	                            <input type="text" class="form-control" name="slug" placeholder="your-slug" value="{{ old('name') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputParent">Parent category</label>
	                            <select name="parent_id" class="form-control mb-10">
                                    <option value=""> -- Root -- </option>
                                    @if( $orderCategory )
                                    	@foreach( $orderCategory as $order )
                                    		<option value="{{ $order->id }}"> {{ $order->name }} </option>
                                    	@endforeach
                                    @endif
                                </select>
	                        </div>
	                        <div class="form-group">
	                            <label for="formatDisplay">Format display</label>
		                		<div class="col-md-12">
			                        <label class="checkbox checkbox-custom">
		                                <input name="format" type="radio" value="news" checked="checked"><i></i> News
		                            </label>
			                        <label class="checkbox checkbox-custom">
		                                <input name="format" type="radio" value="motorbike"><i></i> Motorbike
		                            </label>
			                        <label class="checkbox checkbox-custom">
		                                <input name="format" type="radio" value="gallery"><i></i> Gallery
		                            </label>
		                			<div class="clearfix"></div>
		                		</div>
		                		@if( $errors->has('format') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('format') }}
	                        		</span>
	                        	@endif
	                        </div>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>SEO </strong>Form</h1>
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
	                        <div class="form-group">
	                            <label for="exampleInputTitle">Title</label>
	                            <input type="text" class="form-control" name="set_title" placeholder="Change category default title" value="{{ old('set_title') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputKeywords">Keywords</label>
	                            <input type="text" class="form-control" name="meta_key" placeholder="Keywords" value="{{ old('meta_key') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputDescription">Description</label>
	                            <input type="text" class="form-control" name="meta_desc" placeholder="Description" value="{{ old('meta_desc') }}">
	                        </div>
	                        <button type="submit" class="btn btn-rounded btn-primary btn-sm">Save</button>
		                </div>

		            </section>
		        </div>
		    </form>
	    </div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		var table = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "aoColumnDefs": [
              { 'bSortable': false, 'aTargets': [ "no-sort" ] }
            ]
        });

	</script>
@endpush