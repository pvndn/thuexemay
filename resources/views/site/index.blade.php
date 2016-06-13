@extends('site.layouts.master')
@section('title'){!! $setting->title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $setting->description or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $setting->keyword or 'thuê xe máy Phương Bình' !!}@endsection
@section('content')
    <div class="jumbotron">
        <div class="slideshow animated zoomIn">
            <div class="camera_wrap camera_emboss camera_azure_skin">
                @if($slider)
                    @foreach($slider as $s)
                        <div data-src="{{ $s->image }}"></div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="service">
            <div class="container">
                <div class="row">
                    <div class="feature animated bounceInLeft" style="visibility: visible; -webkit-animation-delay:1s;">
                        <h3><span>Hotline: {{ $setting->phone or '0906 40 80 40 - 0984 241 372' }}</span></h3>
                        <h3>Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay</h3>
                    </div>
                </div>
            </div>
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
                                <ul class="nav nav-tabs tabs-while" role="tablist">
                                    @if($motoCate)
                                        @foreach( $motoCate as $cateMoto )
                                        <li role="presentation">
                                            <h2>
                                                <a href="#{{ $cateMoto->slug }}" aria-controls="{{ $cateMoto->slug }}" role="tab" data-toggle="tab" aria-expanded="false">
                                                    {{ $cateMoto->name }}
                                                </a>
                                            </h2>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @if($motoCate)
                                        @foreach( $motoCate as $cateMoto )
                                        <div style="display: none;">
                                            <?php 
                                                $categories = $cateMoto->select('id')->whereBetween('lft',[$cateMoto->lft, $cateMoto->rgt])->get();
                                                $moto = \App\Models\Carriage::whereIn('category_id', $categories)->orderBy('id', 'desc')->get();
                                            ?>
                                        </div>
                                            
                                        <div role="tabpanel" class="tab-pane" id="{{ $cateMoto->slug }}">
                                            <div class="wrap-reset">
                                                @foreach( $moto as $m)
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
                                                @endforeach
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

    <div class="content">
        <div class="news">
            <div class="container">
                <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 2s;">
                    <span>Tin tức & sự kiện</span>
                </h3>
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
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ url(elixir('css/camera.css')) }}" type="text/css">
@endpush

@push('scripts')
    <script type='text/javascript' src="{{ url(elixir('js/jquery.easing.js')) }}"></script>
    <script type='text/javascript' src="{{ url(elixir('js/jquery.mobile.customized.js')) }}"></script>
    <script type='text/javascript' src="{{ url(elixir('js/camera.js')) }}"></script>
    <script type="text/javascript">
        jQuery(function(){
            jQuery('.camera_wrap').camera({
                loader: 'bar',
                thumbnails: false,
                opacityOnGrid: false,
                hover: false,
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('ul.nav li:first').addClass('active');
            $('.tab-pane:first').addClass('active'); 
        });
        
        $(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                localStorage.setItem('currentTab', $(this).attr('href'));
            });

            var lastTab = localStorage.getItem('currentTab');

            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
        });

    </script>

@endpush