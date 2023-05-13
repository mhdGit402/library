@extends('layout')

@section('book_list')
    <div id="bookList">
        <booklist-component :data="{{$data}}"></booklist-component>
    </div>
@endsection