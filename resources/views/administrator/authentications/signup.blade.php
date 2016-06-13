@extends('administrator.layouts.app')

@section('action.name')
    Đăng kí
@stop

@section('action.form_action')
{{ route('admin.doregister') }}
@stop

@section('action.register')
    <div class="form-group">
        <input type="text" name="name" class="form-control underline-input" placeholder="Họ tên" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <p class="parsley-errors-list filled" style="text-align: left;">
                <span class="parsley-required">{{ $errors->first('name') }}</span>
            </p>
        @endif
    </div>
@stop

@section('action.password')
   <div class="form-group">
        <input type="password" name="password" placeholder="Mật khẩu" class="form-control underline-input{{ $errors->has('password') ? ' parsley-error' : '' }}">
        @if ($errors->has('password'))
            <p class="parsley-errors-list filled" style="text-align: left;">
                <span class="parsley-required">{{ $errors->first('password') }}</span>
            </p>
        @endif
    </div>
@stop

@section('action.confpassword')
    <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" class="form-control underline-input">
        @if ($errors->has('password_confirmation'))
            <p class="parsley-errors-list filled" style="text-align: left;">
                <span class="parsley-required">{{ $errors->first('password_confirmation') }}</span>
            </p>
        @endif
    </div>
@stop

@section('action.hand')
    <a href="{{ route('admin.login') }}" class="btn btn-lightred b-0 text-uppercase">Quay lại</a>
@stop