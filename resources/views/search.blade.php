@extends('layout')

@section('search')
    <div id="search">
        <search-component :get="{{$get}}" :save="{{$save}}" :data="{{$data}}"></search-component>
    </div>
@endsection