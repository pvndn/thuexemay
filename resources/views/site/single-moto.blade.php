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
                <div class="row">
                    <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 1.5s;">
                        <span>Nổi bật</span>
                    </h3>
                    <div class="tile-body">
                        @if(!empty($post->albums))
                        <div id="thumbnail-slider" style="display:none;">
                            <div class="inner">
                                <ul>
                                @foreach($post->albums as $album)
                                    <li>
                                        <a class="thumb" href="{{ $album->photo }}"></a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <div id="closeBtn">CLOSE</div>
                        </div>
                        <ul id="myGallery">
                            @foreach($post->albums as $album)
                                <li><img src="{{ $album->photo }}" title="{{ $post->name }}" alt="{{ $post->name }}" /></li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="body">
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
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center subm">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Đặt thuê xe</a>
                        </div>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="engine-loading"></div>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title custom-font">Thông tin thuê xe</h3>
                                    </div>
                                    <div class="modal-body">
                                        <section class="tile">
                                            <form action="{{ route('post.order') }}" method="POST" data-toggle="validator" role="form" id="formsub">
                                                <div class="tile-body">
                                                    {{ csrf_field() }}
                                                    {{ method_field('POST') }}
                                                    <input type="hidden" name="cariage_id" value="{{ $post->id }}" id="carriageID" data-name="{{ $post->name }}">
                                                    <div class="form-group">
                                                        <label for="inputName" class="control-label">Họ tên</label>
                                                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Họ tên" value="{{ old('name') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">Email</label>
                                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Địa chỉ E-mail"" value="{{ old('email') }}" data-error="Địa chỉ E-mail không hợp lệ" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <label for="inputTwitter" class="control-label">Số điện thoại</label>
                                                        <input type="tel" pattern="^(0|\+[0-9]{1,5})([1-9][0-9]{8}?([0-9]{0,1}))$" maxlength="11" class="form-control" id="inputTwitter" value="{{ old('phone') }}" placeholder="Số điện thoại" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputSlug">Ghi chú</label>
                                                        <textarea name="message" class="form-control" placeholder="Ghi chú của bạn" id="txtmessage">{{ old('message') }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputSlug">*Loại xe: {{ $post->category->name }} - {{ $post->name }}. Giá thuê: {{ $post->price }}</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" id="button"><i class="fa fa-arrow-right"></i> Đặt thuê</button>
                                                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ url(elixir('css/thumbnail-slider.css')) }}" type="text/css">
    <style type="text/css">
        .body table {
            width: 100%;
        }
        .body table tr:nth-child(odd) {
            background: #fff;
        }
        .body table tr:nth-child(even) {
            background: #f1f1f1;
        }
        .body table tr th, .body table tr td {
            table-layout: fixed;
            padding: 16px 20px;
            font-size: 15px;
            width: 50%;
            line-height: 18px;
            height: 50px;
            text-align: left;
        }
        .subm {
            margin: 30px 0 0;
        }
        .modal-content {
            border-radius: 0;
        }
        .engine-loading {
            position: absolute;
            left: 45%;
            top: 35%;
            bottom: 0;
            z-index: 1;
            right: 0;
        }
    </style>
@endpush

@push('scripts')
    <script type='text/javascript' src="{{ url(elixir('js/thumbnail-slider.js')) }}"></script>
    <script type='text/javascript' src="{{ url(elixir('js/validator.min.js')) }}"></script>
    
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
        var postOrderUrl = "{{ route('post.order') }}";
        var redirectUrl = "{{ route('get.order') }}";
        var _token = "{{ csrf_token() }}";
        var img = '/vendor/img/load.gif';
        $(document).ready(function() {
            $('.engine-loading').append('<img src="'+img+'">');
        });
    </script>
@endpush