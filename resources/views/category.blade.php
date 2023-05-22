@extends('layout')

@section('category')
    <div id='category' style="margin-top:35px;">
        <category-component :data="{{$data}}"></category-component>
    </div>
@endsection