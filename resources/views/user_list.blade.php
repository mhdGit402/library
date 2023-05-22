@extends('layout')

@section('user_list')
    <div id='userList' style="margin-top:35px;">
        <userlist-component :data="{{$data}}"></userlist-component>
    </div>
@endsection