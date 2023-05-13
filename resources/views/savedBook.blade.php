@extends('layout')

@section('saved_books')
    <div id='savedBooks'>
        <savedbook-component :data="{{$data}}"></savedbook-component>
    </div>
@endsection