@extends('layout')

@section('search')
    <div id="search" style="margin-top:35px;">
        <search-component :get="{{$get}}" :save="{{$save}}" :data="{{$data}}"></search-component>
    </div>
@endsection