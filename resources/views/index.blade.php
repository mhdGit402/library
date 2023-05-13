@extends('layout')

@section('index')
    <div id="app">
        <home-component :get="{{ $get }}" :save="{{ $save }}" :data="{{ $data }}"></home-component>
    </div>
@endsection