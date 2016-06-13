@extends('site.layouts.master')

@section('title'){!! $post->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $post->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $post->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('client.slug', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                <li class="active">{{ $post->name }}</li>
            </ol>
        </div>
    </div>

    <div class="content">
        <div class="news page">
            <div class="container">
                <div class="col-md-9 cl-lg-9 col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="tile-body">
                            <div class="col-md-10 col-md-offset-1">
                                <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 1.5s;">
                                    <span>{{ $post->name }}</span>
                                </h3>
                                
                                <div class="row">
                                    <div class="col-md-12 content">
                                        {!! $post->content !!}
                                    </div>  
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style type="text/css">
        .page img {
            width: 100%;
        }
    </style>
@endpush