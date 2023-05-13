@extends('layout')

@section('user')
   <div id='user'>
        <user-component :data="{{$data}}"></user-component>
    </div> 
@endsection