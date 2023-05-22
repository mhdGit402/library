@extends('layout')

@section('getBook')
    <div id='getBook' style="margin-top:35px;">
        <getbook-component :user_id="{{$user_id}}" :library_id="{{$library_id}}" :data="{{$data}}"></getbook-component>
    </div>
@endsection