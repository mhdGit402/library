@extends('layout')

@section('my_books')
    <div id='myBook' style="margin-top:35px;">
        <mybook-component :data="{{$data}}"></mybook-component>
    </div>
@endsection