@extends('layouts.master')
@section('title')
    Add Page
@stop
@section('body')
@if(Auth::check())
@if(Session::get('data'))
    <div class="bs-example">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>{{Session::get('data')}}</strong>.
        </div>
    </div>
@endif
<h2 class="text-center">User Form</h2>
    {!! Form::open() !!}
    Name: {!!Form::text('name','',['class'=>'form-control'])!!}<br/>
Email:{!!Form::text('email','',['class'=>'form-control'])!!}<br/>
Password:{!!Form::text('password','',['class'=>'form-control'])!!}<br/>
{!!Form::submit('Add User',['class'=>'btn btn-primary form-control'])!!}
    {!!Form::close()!!}<br/><br/>

@foreach($v as $d)
    <ul>
        <li>{{$d->email}}------{{$d->name}}---{{$d->password}}</li>
    </ul>
    @endforeach
@else
    <h2>Not Logged In!</h2>
    @endif
@stop