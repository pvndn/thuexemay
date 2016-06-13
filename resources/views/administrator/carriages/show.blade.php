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

@push('css')
<link rel="stylesheet" href="/assets/admin/css/thumbnail-slider.css" type="text/css">
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
</style>
@endpush

@push('scripts')
	<script type='text/javascript' src='/assets/admin/js/thumbnail-slider.js'></script> 
	
    <script>
        var thumbSldr = document.getElementById("thumbnail-slider");
        var closeBtn = document.getElementById("closeBtn");
        var galleryImgs = document.getElementById("myGallery").getElementsByTagName("li");
        for (var i = 0; i < galleryImgs.length; i++) {
            galleryImgs[i].index = i;
            galleryImgs[i].onclick = function (e) {
                var li = this;
                thumbSldr.style.display = "block";
                mcThumbnailSlider.init(li.index);
            };
        }

        thumbSldr.onclick = closeBtn.onclick = function (e) {
            thumbSldr.style.display = "none";
        };
    </script>

	<script type="text/javascript">
		var table = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "sort": false
        });
	</script>
	
	<script>
        $(document).ready(function() {
        	$('input[name=publish]').change(function(event) {
        		var cate_id;
        		cate_id = $(this).parent().find('input[name=publish]').attr('cate-id');
        		var url = base_url;
        		var data;
        		var value = $('input[name=publish]').attr("checked") ? 1 : 0;
        		if( value == 1 ) {
        			data = 1;
        		} else {
        			data = 0;
        		}
        		$.ajax({
        			url: '{{ route("admin.carriage.publish") }}',
        			method: 'motorbike',
        			data: { 'publish': data, 'id': cate_id, '_token': $('meta[name="csrf-token"]').attr('content') },
        			success: function (result) {
        				$('#noti').html(result);
        				$('#noti').fadeIn(400).delay(3000).fadeOut(400);
					}
        		});
        	});
        });
	</script>
@endpush