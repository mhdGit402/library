@extends('layout')

@section('saved_books')
    <div id='savedBooks' style="margin-top:35px;">
        <savedbook-component :data="{{$data}}"></savedbook-component>
    </div>
@endsection