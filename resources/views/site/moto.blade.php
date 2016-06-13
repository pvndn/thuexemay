@extends('site.layouts.master')

@section('title'){!! $category->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $category->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $category->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $category->name }}</li>
            </ol>
        </div>
    </div>

    <div class="content">
        <div class="room">
            <div class="container">
                <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 1.5s;">
                    <span>Lựa chọn phong cách riêng của bạn</span>
                </h3>
                <div class="slogan"></div>
                <div class="ls-room">
                    <div class="row">
                        <div class="tile-body">
                            <div role="tabpanel">
                                <div class="tab-content">
                                    @if($motoCate)
                                        @foreach( $motoCate as $m )
                                        <div class="wrap-reset">
                                            <div class="item">
                                                <a href="javascript:;">
                                                    <img class="hover-me" src="{{ $m->image }}" alt="{{ $m->name }}" title="{{ $m->name }}">
                                                </a>
                                                <div class="desc">
                                                    <p class="name">{{ $m->name }}</p>
                                                    <p class="price">Giá thuê<strong> {{ $m->price }}</strong></p>
                                                    <a href="{{ route('client.posts', [$m->category->slug, $m->slug]) }}" class="btn btn-red">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                                                </div>
                                                <div class="item-hovered">
                                                    <img class="img-hovered" src="{{ $m->image }}" alt="{{ $m->name }}" title="{{ $m->name }}">
                                                    <div class="more">
                                                        <p class="name">{{ $m->name }}</p>
                                                        <p class="price">Giá thuê<strong> {{ $m->price }}</strong></p>
                                                        <a class="btn" href="{{ route('client.posts', [$m->category->slug, $m->slug]) }}">
                                                            <img src="/vendor/img/btn-more.png" alt="{{ $m->name }}" title="{{ $m->name }}">
                                                        </a>
                                                    </div>
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
        </div>
    </div>
@endsection
