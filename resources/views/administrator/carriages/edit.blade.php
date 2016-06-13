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
		                <a href="">edit motorbike</a>
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
			<form action="{{ route('admin.carriage.update', $motorbike->id) }}" method="POST">
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
	                            <label for="exampleInputName">Name</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name motorbike" value="{{ old('name', $motorbike ? $motorbike->name : '') }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Slug</label>
	                            <input type="text" class="form-control" name="slug" placeholder="your-slug" value="{{ old('slug', $motorbike ? $motorbike->slug : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputParent">Category</label>
	                            <select name="category_id" class="form-control mb-10">
                                    <option value=""> -- Choose category -- </option>
                                    @if( $categories )
                                    	@foreach( $categories as $id => $name )
                                    		<option value="{{ $id }}" {{ $motorbike->category->id == $id ? 'selected=selected' : '' }}> {{ $name }} </option>
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
	                            <input type="text" class="form-control" name="set_title" placeholder="Change category default title" value="{{ old('set_title', $motorbike ? $motorbike->set_title : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputKeywords">Keywords</label>
	                            <input type="text" class="form-control" name="meta_key" placeholder="Keywords" value="{{ old('meta_key', $motorbike ? $motorbike->meta_key : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputDescription">Description</label>
	                            <input type="text" class="form-control" name="meta_desc" placeholder="Description" value="{{ old('meta_desc', $motorbike ? $motorbike->meta_desc : '') }}">
	                        </div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-12">
		        	<section class="tile">
		                <div class="tile-body">
		                	<div class="col-md-6">
		                        <div class="form-group">
		                            <label for="exampleInputSlug">Price</label>
		                            <input type="text" class="form-control" name="price" placeholder="rental amount motorbike" value="{{ old('price', $motorbike ? $motorbike->price : '') }}">
		                        </div>

			                	<div class="form-group">
		                        	<span class="input-group-btn">
								        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
								          <i class="fa fa-picture-o"></i> Choose image
								        </a>
								    </span>
								    <input id="thumbnail" class="form-control" type="text" name="image" value="{{ old('image', $motorbike ? $motorbike->image : '') }}">
		                        </div>
				                <div class="col-md-6 col-md-offset-3">
				                	<img id="holder" style="width: 100%;" src="{{ $motorbike->image }}">
				                </div>
		                	</div>
		                	<div class="col-md-6">
		                		@if(!empty($motorbike->albums))
			                    <ul id="myGallery">
			                    	@foreach($motorbike->albums as $album)
			                        	<li id="{{ $album->id }}">
			                        		<div>
			                        			<img src="{{ $album->photo }}" />
			                        		</div>
			                				<div style="text-align: center; padding: 5px;">
			                					<a class="btn btn-danger btn-rounded mb-10" href="#0" onclick="return removeRecord({{ $album->id }})">
			                						<i class="fa fa-trash"></i>
			                					</a>
			                				</div>
			                        	</li>
			                        @endforeach
			                    </ul>
						        @endif
			                	<div class="clearfix"></div>
                				<div>
                					<a href="#0" class="btn btn-primary btn-rounded-10 btn-ef btn-ef-3 btn-ef-3b mb-10" onclick="return loadField()">
                						<i class="fa fa-plus"></i> Insert image
                					</a>
                				</div>
			                	<div class="clearfix"></div>
                				<div id="record"></div>
		                	</div>
			                <div class="clearfix"></div>

			                
			                <div class="clearfix"></div>

		                    <div class="form-group">
		                        <label for="exampleInputParent">Content</label>
		                        <textarea name="content" class="form-control mb-10" id="newscontent">{{ old('content', $motorbike ? $motorbike->content : '') }}</textarea>
		                    </div>
	                        <button type="submit" class="btn btn-rounded btn-primary btn-sm">Save</button>
		                </div>
		            </section>
		        </div>
		    </form>
	    </div>
	</div>
	<div id='noti' style='display:none'></div>
@endsection

@push('css')
<link rel="stylesheet" href="/assets/admin/css/thumbnail-slider.css" type="text/css">
<style type="text/css" media="screen">
	#noti {
	    width:300px;
	    height:auto;
	    position:absolute;
	    right:35px;
	    margin-left:-100px;
	    top:725px;
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

		function fileManager(id) {
			$('#'+id).filemanager('image');
		}

		function loadField() {
			var id = 1 + Math.floor(Math.random() * 3600);
			$('#record').append('<div class="form-group '+id+'"><div class="row"><div class="col-md-4"><a id="'+id+'" data-input="thumbnail-photo-'+id+'" data-preview="holder" class="photo btn btn-primary" onclick="return fileManager('+id+')"><i class="fa fa-picture-o"></i> Insert image </a></div><div class="col-md-6"><input id="thumbnail-photo-'+id+'" class="form-control" type="text" name="photo[]"></div><div class="col-md-2"><a class="btn btn-danger btn-rounded mb-10" href="#0" onclick="return removeField('+id+')"><i class="fa fa-trash"></i></a></div></div></div>')
		}

		function removeField(id) {
			$('.'+id).remove();
		}

		function removeRecord(id) {
			if(confirm('are you ready!') == true) {
				var url = "{{ route('admin.carriage.album') }}";
				var _token = "{{ csrf_token() }}";
				$.ajax({
					url: url + '/' + id,
					method: 'DELETE',
					data: { '_token': _token, 'id': id  },
					success: function (result) {
						$('#'+id).remove();
						$('#noti').html(result);
	        			$('#noti').slideDown(400).delay(3000).fadeOut(400);
					}
				});
			}
		}
	</script>
@endpush