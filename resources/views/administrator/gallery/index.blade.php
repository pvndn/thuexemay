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
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>

		<section class="gallery">
	       	@include('administrator.partials.flash')
	       	<div>
	       		<a href="{{ route('admin.gallery.create') }}" title="Add new" class="btn btn-greensea">Add image</a>
	       	</div>
	        <div class="row mix-grid">
	            <div class="gallery" data-lightbox="gallery">
	            	@if( $galleries )
	            		@foreach( $galleries as $image )
			                <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
			                    <div class="img-container">
			                        <img class="img-responsive" alt="" src="{{ $image->image }}">
			                        <div class="img-details">
			                            <h4 class="custom-font ng-binding">{{ $image->title }}</h4>
			                            <div class="img-controls">
			                                <a href="{{ route('admin.gallery.edit', $image->id) }}" class="img-select">
			                                    <i class="fa fa-circle-o"></i>
			                                    <i class="fa fa-circle"></i>
			                                </a>
			                                <a class="img-preview" data-lightbox="gallery-item" href="{{ $image->image }}" title="{{ $image->title }}">
			                                    <i class="fa fa-search"></i>
			                                </a>
			                                <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST">
			                                	{{ method_field('DELETE') }}
			                                	{{ csrf_field() }}
			                                	<button class="btn btn-primary btn-rounded btn-ef btn-ef-5 btn-ef-5a mb-10" onclick="return confirm('Are you ready');">
			                                		<i class="fa fa-trash"></i> <span>Delete</span>
			                                	</button>
			                                </form>
			                            </div>
			                        </div>
			                    </div>
			                </div>
	                	@endforeach
	                @endif
	            </div>
	        </div>
	    </section>
	</div>
	<div id='result' style='display:none'></div>
@endsection

@push('css')
	<link rel="stylesheet" href="/assets/admin/js/vendor/magnific-popup/magnific-popup.css">
@endpush

@push('scripts')

    <script src="/assets/admin/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="/assets/admin/js/vendor/mixitup/jquery.mixitup.min.js"></script>

	<script>
        $(window).load(function(){
            $('.mix-grid').mixItUp();
            $('.mix-controls .select-all input').change(function(){
                if($(this).is(":checked")) {
                    $('.gallery').find('.mix').addClass('selected');
                    enableGalleryTools(true);
                } else {
                    $('.gallery').find('.mix').removeClass('selected');
                    enableGalleryTools(false);
                }
            });

            $('.mix .img-select').click(function(){
                var mix = $(this).parents('.mix');
                if(mix.hasClass('selected')) {
                    mix.removeClass('selected');
                    enableGalleryTools(false);
                } else {
                    mix.addClass('selected');
                    enableGalleryTools(true);
                }
            });

            var enableGalleryTools = function(enable) {
                if (enable) {
                    $('.mix-controls li.mix-control').removeClass('disabled');
                } else {
                    var selected = false;
                    $('.gallery .mix').each(function(){
                        if($(this).hasClass('selected')) {
                            selected = true;
                        }
                    });
                    if(!selected) {
                        $('.mix-controls li.mix-control').addClass('disabled');
                    }
                }
            }
        });
    </script>
@endpush