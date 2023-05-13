@extends('layout')

@section('user_update')
    <div id="userUpdate">
        <userupdate-component :data="{{ $data }}"></userupdate-component>
    </div>
@endsection