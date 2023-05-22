@extends('layout')

@section('add_book')

        <div id="createBook" style="margin-top:35px;">
            <createbook-component :data="{{$data}}"></createbook-component>
        </div>

@endsection