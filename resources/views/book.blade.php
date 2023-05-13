@extends('layout')

@section('book')
    <div id="book">
        <book-component :get="{{ $get }}" :save="{{$save}}" :data="{{$data}}"></book-component>
    </div>
@endsection