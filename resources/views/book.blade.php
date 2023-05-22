@extends('layout')

@section('book')
    <div id="book" style="margin-top:35px;">
        <book-component :get="{{ $get }}" :save="{{$save}}" :data="{{$data}}"></book-component>
    </div>
@endsection