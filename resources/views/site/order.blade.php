@extends('site.layouts.master')

@section('title'){!! $setting->title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $setting->description or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $setting->keyword or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    
    <div class="content">
        <div class="news page">
            <div class="container">
                <div class="row">
                    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;"><div class="modal-backdrop fade in" style="height: 622px;"></div>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title custom-font">Thông tin đặt thuê xe của bạn</h3>
                                </div>
                                <div class="modal-body">
                                    <section class="tile col-md-7">
                                        <div class="form-group">
                                            <label class="control-label">Họ tên:</label> {{ $order->name }}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-mail:</label> {{ $order->email }}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Số ĐT:</label> {{ $order->phone }}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Loại xe thuê:</label> {{ $order->carriage->name }} - {{ $order->carriage->category->name }}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Giá thuê:</label> {{ $order->carriage->price }}
                                        </div>
                                    </section>
                                    <section class="tile col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Thông tin liên hệ Cho thuê xe máy Phương Bình</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Số ĐT:</label> 0906 40 80 40 - 0984 241 372
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Địa chỉ:</label> 04 Phan Hữu Ích - TP. Đà Nẵng
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-mail:</label> nhanghiphuongbinh@gmail.com
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Đặt thuê ngày:</label> {{ $order->created_at }}
                                        </div>
                                    </section>
                                    <div class="clearfix"></div>
                                </div> 
                                <div class="modal-footer">
                                    <a href="" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Xuất hóa đơn</a>
                                    <a href="/" class="btn btn-default btn-ef btn-ef-4 btn-ef-4c"><i class="fa fa-arrow-left"></i> Quay về trang chủ</a>
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
    <style type="text/css">
        .content {
            min-height: 285px;;
        }
        
        .modal {
            position: inherit;
        }
        .modal-backdrop.in {
            filter: alpha(opacity=50);
            opacity: 0;
        }
        .modal-content {
            border-radius: 0;
        }
    </style>
@endpush