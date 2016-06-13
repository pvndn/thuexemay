<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Language" content="vi">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('desc')">
        <meta name="keywords" content="@yield('keyword')">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/css/vendor/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{ url(elixir('css/bootstrap.css')) }}" type="text/css">
        <link rel="stylesheet" href="{{ url(elixir('css/animate.css')) }}" type="text/css">
        <link rel="stylesheet" href="{{ url(elixir('css/app.css')) }}" type="text/css">
        @stack('css')

        <link rel="shortcut icon" href="{{ $setting->logo or '' }}" type="image/x-icon"/>
        <script src="/vendor/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--[if lt IE 9]>
            <script src="/vendor/js/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var base_url = '{{ url("/") }}';
        </script>
        <style type="text/css">
            img {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="menu-responsive">
            <div class="menu-inner">
                <hgroup class="title">
                    <img class="logo-responsive" src="{{ $setting->logo or '' }}" title="{!! $setting->title or 'Thuê xe máy Phương Bình' !!}" alt="{!! $setting->title or 'Thuê xe máy Phương Bình' !!}" />
                </hgroup>
                <nav class="menu-nav pull-right">
                    <div class="menu-button">
                        <div class="menu-button-inner"></div>
                    </div>
                </nav>
            </div>
        </div>
        <nav class="navbar navbar-inverse" role="navigation" id="top-menu">
          <div class="header">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <div class="head-top">
                        <span class="logo col-xs-12 col-sm-8 col-md-3 col-lg-3">
                            <a href="">
                                <h1 style="font-size: 0;">Thuê xe máy Đà Nẵng
                                     <img class="logo-responsive" src="{{ $setting->logo or '' }}" title="{{ $setting->title or 'Thuê xe máy Phương Bình' }}" alt="{{ $setting->title or 'Thuê xe máy Phương Bình' }}" />
                                </h1>
                            </a>
                        </span>
                        <span class="email col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <form action="" method="POST" class="form-search">
                                <input type="text" name="keywords" placeholder="Nhập từ khóa tìm kiếm ..." class="form-control">
                                <button class="btn btn-red"><i class="fa fa-search"></i></button>
                            </form>
                        </span>
                        <span class="inf col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <ul>
                                <li>HOTLINE: {{ $setting->phone or '0906 40 80 40 - 0984 241 372' }}</li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="block-menu greedy">
            <div class="container">
                <ul class="links">
                    <li class="active"><a href="/">Trang chủ</a></li>
                    @foreach($menuItem as $item)
                        {!! navication($item) !!}
                    @endforeach
                </ul>
            </div>
          </div>
        </nav>
        <div class="clearfix"></div>
            @yield('content')
        <footer>
            <div class="container">
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                    <div class="row">
                        <div class="logo">
                            <a href="">
                                 <img class="logo-responsive" src="{{ $setting->logo_footer or '' }}" title="{{ $setting->title or 'Thuê xe máy Phương Bình' }}" alt="{{ $setting->title or 'Thuê xe máy Phương Bình' }}" />
                            </a>
                        </div>
                    </div>                   
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 girdfix">
                    <div class="row">
                        <div class="ft-box">
                            <div class="head-title">
                                <h4>
                                    <span>Địa chỉ liên hệ</span>
                                </h4>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <span class="glyphicon glyphicon-phone-alt"></span>
                                        <label>{{ $setting->phone or '0906 40 80 40 - 0984 241 372' }}</label>
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-envelope"></span>
                                        <label>{{ $setting->email or 'nhanghiphuongbinh@gmail.com' }}</label>
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        <label>{{ $setting->adress or '04 Phan Hữu Ích - TP. Đà Nẵng' }}</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 girdfix">
                    <div class="row">
                        <div class="ft-box">
                            <div class="head-title">
                                <h4>
                                    <span>Dịch vụ</span>
                                </h4>
                            </div>
                            <div>
                                <ul>
                                    @foreach($footerItem as $item)
                                        {!! navication($item) !!}
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 mbelement">
                    <div class="row">
                        <div class="ft-box">
                            <div class="head-title">
                                <h4>
                                    <span>Hình ảnh</span>
                                </h4>
                            </div>
                            <div class="gallery">
                            @if($gallery)
                                @foreach($gallery as $g)
                                <a tabindex="1">
                                    <img src="{{ $g->image }}">
                                </a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="clearfix"></div>
                <p class="text-center">
                    Copyright © 2016 Nhà Nghỉ Phương Bình |
                    Thiết Kế Web <a href="http://danangtech.com">danangtech.com</a>
                </p>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        
        <script src="{{ url(elixir('js/bootstrap.js')) }}"></script>

        <script type='text/javascript' src="{{ url(elixir('js/app.js')) }}"></script>
        @stack('scripts')
    </body>
</html>
