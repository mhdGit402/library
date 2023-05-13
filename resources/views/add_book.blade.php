@extends('layout')

@section('add_book')

        <div id="createBook">
            <createbook-component :data="{{$data}}"></createbook-component>
        </div>

@endsection