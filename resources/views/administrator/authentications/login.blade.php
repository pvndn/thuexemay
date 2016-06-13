@extends('administrator.layouts.app')

@section('action.name')
    Đăng nhập
@stop

@section('action.form_action')
{{ route('admin.dologin') }}
@stop

@section('action.do')
    <label class="checkbox checkbox-custom-alt checkbox-custom-sm inline-block">
	    <input type="checkbox" name="remember"><i></i> Ghi nhớ 
	</label>
	<a href="{{ route('admin.forgot') }}" class="pull-right mt-10">Quên mật khẩu?</a>
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

@section('action.hand')
    <a href="{{ route('admin.register') }}" class="btn btn-lightred b-0 text-uppercase">Tạo tài khoản</a>
@stop