@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>News</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">news</a>
		            </li>
		            <li>
		                <a href="">add new post</a>
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
			<form action="{{ route('admin.news.store') }}" method="POST">
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
	                            <input type="text" class="form-control" name="name" placeholder="Enter name post" value="{{ old('name') }}">
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
	                            <label for="exampleInputParent">Category</label>
	                            <select name="category_id" class="form-control mb-10">
                                    <option value=""> -- Choose category -- </option>
                                    @if( $categories )
                                    	@foreach( $categories as $id => $name )
                                    		<option value="{{ $id }}"> {{ $name }} </option>
                                    	@endforeach
                                    @endif
                                </select>
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
		                </div>
		            </section>
		        </div>
		        <div class="col-md-12">
		        	<section class="tile">
		                <div class="tile-body">
		                	<div class="form-group">
	                        	<span class="input-group-btn">
							        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
							          <i class="fa fa-picture-o"></i> Choose image
							        </a>
							    </span>
							    <input id="thumbnail" class="form-control" type="text" name="image">
	                        </div>

			                <div class="col-md-6 col-md-offset-3">
			                	<img id="holder" style="width: 100%;">
			                </div>
			                
			                <div class="clearfix"></div>

		                    <div class="form-group">
		                        <label for="exampleInputParent">Content</label>
		                        <textarea name="content" class="form-control mb-10" id="newscontent">{{ old('content') }}</textarea>
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
	<script src="/vendor/tinymce/tinymce.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

	<script>
	  var editor_config = {
	    path_absolute : "/",
	    selector: "#newscontent",
	    height : 300,
	    entity_encoding : "raw",
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	    relative_urls: false,
	    setup : function(ed)
		{
		    ed.on('init', function() 
		    {
		        this.getDoc().body.style.fontSize = '16px';
		    });
		},
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager/admin/file?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config);
	</script>
	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush