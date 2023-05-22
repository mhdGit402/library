@extends('layout')

@section('user_update')
    <div id="userUpdate" style="margin-top:35px;">
        <userupdate-component :data="{{ $data }}"></userupdate-component>
    </div>
@endsection