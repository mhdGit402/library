@extends('layout')

@section('my_books')
    <div id='myBook'>
        <mybook-component :data="{{$data}}"></mybook-component>
    </div>
@endsection