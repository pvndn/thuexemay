<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>K-Backend - Admin Dashboard</title>
        <link rel="icon" type="image/ico" href="/assets/admin/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
        <!-- vendor css files -->
        <link rel="stylesheet" href="/assets/admin/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/admin/css/vendor/animate.css">
        <link rel="stylesheet" href="/assets/admin/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="/assets/admin/js/vendor/summernote/summernote.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="/assets/admin/css/main.css">
        <!--/ stylesheets -->
        @stack('css')
        <style type="text/css">
            a:hover {
                text-decoration: none;
            }
        </style>

        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="/assets/admin/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->
        <script type="text/javascript">
            var base_url = "{{ url('/') }}";
        </script>
    </head>

    <body id="minovate" class="appWrapper">

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">

            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    @include('administrator.partials.fixed_bar')

                </header>

            </section>
            <!--/ HEADER Content  -->

            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">

                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">

                    @include('administrator.partials.right_bar')

                </aside>
                <!--/ RIGHTBAR Content -->

            </div>
            <!--/ CONTROLS Content -->

            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">
                @yield('content')
                
            </section>
            <!--/ CONTENT -->

        </div>
        <!--/ Application Content -->

        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/admin/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/assets/admin/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="/assets/admin/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="/assets/admin/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="/assets/admin/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="/assets/admin/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="/assets/admin/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="/assets/admin/js/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="/assets/admin/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="/assets/admin/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="/assets/admin/js/vendor/raphael/raphael-min.js"></script>
        <script src="/assets/admin/js/vendor/morris/morris.min.js"></script>

        <script src="/assets/admin/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="/assets/admin/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="/assets/admin/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="/assets/admin/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <script src="/assets/admin/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="/assets/admin/js/vendor/summernote/summernote.min.js"></script>

        <script src="/assets/admin/js/vendor/coolclock/coolclock.js"></script>
        <script src="/assets/admin/js/vendor/coolclock/excanvas.js"></script>

        
        <!--/ vendor javascripts -->

        @stack('scripts')


        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <!-- <script src="/assets/admin/js/jquery.nicescroll.js"></script>
        <script src="/assets/admin/js/scripts.js"></script> -->
        <script src="/assets/admin/js/main.js"></script>
        <!--/ custom javascripts -->

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Initialize owl carousels
                $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    responsive: true
                });

                $('#appointments-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    navigation: true,
                    navigationText : ['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa-chevron-right\'></i>'],
                    singleItem : true
                });
                //* Initialize owl carousels


                //Initialize mini calendar datepicker
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
                //*Initialize mini calendar datepicker


                //todo's
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });
                //* todo's


                //initialize datatable
                $('#project-progress').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                });
                //*initialize datatable

                //load wysiwyg editor
                $('#summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143   //set editable area's height
                });
                //*load wysiwyg editor
            });
        </script>
        <!--/ Page Specific Scripts -->
    </body>
</html>

