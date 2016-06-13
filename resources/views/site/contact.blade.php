@extends('site.layouts.master')

@section('title'){!! $page->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $page->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $page->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $page->name }}</li>
            </ol>
        </div>
    </div>

    <div class="content">
        <div class="news page">
            <div class="container">
                <div class="ls-new">
                    <div class="row">
                        <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 1.5s;">
                            <span>{{ $page->name }}</span>
                        </h3>
                        
                        <div class="col-md-4">
                            <form action="" method="POST">
                                <div class="tile-body">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="exampleInputName">Họ tên</label>
                                        <input type="text" class="form-control" name="name" placeholder="Your name" value="{{ old('name') }}">
                                        @if( $errors->has('name') )
                                            <span class="help-block mb-0">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSlug">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="your email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputParent">Nội dung</label>
                                        <textarea name="body" class="form-control">{{ old('body') }}</textarea>
                                    </div>
                                    <button class="btn btn-primary">Gửi</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="tile-body">
                                @if($page->image)
                                <div class="row" id="baner-image">
                                    <img src="{{ $page->image }}" style="width: 100%;" id="showImage">
                                </div>
                                @endif
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-md-12 content">
                                            {!! $page->content !!}
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
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
        var url = $('#baner-image img').attr('src');
        $('img#showImage').css('display','none');

        $('#baner-image').css({
            'background-image': 'url('+ url +')',
            'background-size': 'cover',
            'background-repeat': 'no-repeat',
            'background-position': 'center center',
            'width': '100%',
            'height': '25em',
        });
    });
</script>
@endpush
