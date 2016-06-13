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
        <div class="news page">
            <div class="container">
                <div class="ls-new">
                    <div class="row">
                        @if($news)
                            @foreach($news as $post)
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 girdfix">
                                    <div class="it-new">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="gallery">
                                                    <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                                        <img class="img-responsive" src="{{ $post->image }}" alt="{{ $post->name }}" title="{{ $post->name }}">
                                                    </a>
                                                </div>
                                            </div>                   
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="text">
                                                    <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                                        <h2>{{ $post->name }}</h2>
                                                    </a>
                                                    <p>
                                                        <?php $findspace = @strpos($post->content, ' ', 120) ?: 150; ?>
                                                        {!! substr($post->content, 0, $findspace) !!}
                                                    </p>
                                                    <p class="pull-right">
                                                        <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">Xem chi tiết</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="pull-right">
                    {!! $news->appends(Request::query())->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
