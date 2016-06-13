@extends('administrator.layouts.app')

@section('action.name')
    Quên mật khẩu
@stop

@section('action.form_action')
{{ route('admin.sendmail') }}
@stop

@section('action.hand')
    <a href="{{ route('admin.login') }}" class="btn btn-lightred b-0 text-uppercase">Quay lại</a>
@stop