@extends('layout')

@section('index')
    <div id="app" style="background-color: #ededed;">
        <home-component :get="{{ $get }}" :save="{{ $save }}" :data="{{ $data }}"></home-component>
    </div>
@endsection