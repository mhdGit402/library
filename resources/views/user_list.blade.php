@extends('layout')

@section('user_list')
    <div id='userList'>
        <userlist-component :data="{{$data}}"></userlist-component>
    </div>
@endsection