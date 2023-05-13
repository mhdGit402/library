@extends('layout')

@section('category')
    <div id='category'>
        <category-component :data="{{$data}}"></category-component>
    </div>
@endsection