@extends('layout')

@section('getBook')
    <div id='getBook'>
        <getbook-component :user_id="{{$user_id}}" :library_id="{{$library_id}}" :data="{{$data}}"></getbook-component>
    </div>
@endsection