@extends('layout')

@section('book_list')
    <div id="bookList" style="margin-top:35px;">
        <booklist-component :data="{{$data}}"></booklist-component>
    </div>
@endsection