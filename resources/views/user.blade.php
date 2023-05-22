@extends('layout')

@section('user')
   <div id='user' style='margin-top:35px;'>
        <user-component :data="{{$data}}"></user-component>
    </div> 
@endsection