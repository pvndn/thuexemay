@extends('site.layouts.master')

@section('title'){!! $category->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $category->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $category->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Introduce</li>
            </ol>
        </div>
    </div>

    <div class="content">
        <div class="news page">
            <div class="container">
                <div class="ls-new gallery">
                    <div class="row mix-grid">
                        <div class="gallery" data-lightbox="gallery">
                            @if( $galleries )
                                @foreach( $galleries as $image )
                                    <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                        <div class="img-container">
                                            <div class="img-details">
                                                <a href="{{ $image->image }}" data-lightbox="roadtrip">
                                                    <img class="img-responsive" alt="" src="{{ $image->image }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ url(elixir('css/lightbox.css')) }}" type="text/css">
@endpush

@push('scripts')

    <script src="{{ url(elixir('js/lightbox.js')) }}"></script>

    <script>
        
    </script>
@endpush