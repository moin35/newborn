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
    Phone: {!!Form::text('phone','',['class'=>'form-control'])!!}<br/>
Message:{!!Form::textarea('msg','',['class'=>'form-control'])!!}<br/>

{!!Form::submit('Send sms',['class'=>'btn btn-primary form-control'])!!}
    {!!Form::close()!!}<br/><br/>

@foreach($v as $d)
    <ul>
        <li>{{$d->phone}}------{{$d->name}}---{{$d->msg}}</li>
    </ul>
    @endforeach
@else
    <h2>Not Logged In!</h2>
    @endif
@stop