@extends('layouts.master')
@section('title')
    Mother Registration
@stop
@section('head')

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
        <div class="row">
            <div class="col-md-12">
            <br>
<div class="panel panel-default">
  <div class="panel-heading"><h3>Mother Registration</h3>
</div>
  <div class="panel-body">
    {!! Form::open() !!}
<div class="form" >
    <div class="form-group">
        
        <div class="col-lg-6">
        <label for="mname" class="control-label col-lg-6">Name</label>
            <input class=" form-control" id="mname" name="mname" type="text" />
        </div>
    </div>
    <div class="form-group">
         <div class="col-lg-6">
         <label for="sname" class="control-label col-lg-6">Spouse Name</label>
       
            <input class=" form-control" id="sname" name="sname" type="text" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-6">
        <label for="mnid" class="control-label col-lg-6">NID</label> 
            <input class=" form-control" id="mnid" name="mnid" type="text" />
        </div>
    </div>
    <div class="form-group">
         <div class="col-lg-6">
          <label for="snid" class="control-label col-lg-6">Spouse NID</label>
      
            <input class=" form-control" id="snid" name="snid" type="text" />
        </div>
    </div>
        <div class="form-group">
        <div class="col-lg-6">
          <label for="dbirth" class="control-label col-lg-6">Date Of Birth</label>
            <input class=" form-control" id="dbirth" name="dbirth" type="date" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-6">
         <label for="cdate" class="control-label col-lg-6">Conceive Date</label>
            <input class=" form-control" id="cdate" name="cdate" type="date" />
        </div>
    </div>
        <div class="form-group">
        <div class="col-lg-6">
         <label for="mmobile" class="control-label col-lg-6">Mobile Number</label>
            <input class=" form-control" id="mmobile" name="mmobile" type="text" />
        </div>
    </div>
        <div class="form-group">
        <div class="col-lg-6">
         <label for="smobile" class="control-label col-lg-6">Spouse Mobile Number</label>
            <input class=" form-control" id="smobile" name="smobile" type="text" />
        </div>
    </div>
      <div class="form-group">
        <div class="col-lg-12">
         <label for="division" class="control-label col-lg-6">Division</label>
           <select class=" form-control" name="division" id="countySel" size="1">
        <option value="" selected="selected">Select Division</option>
    </select>
        </div>
        </div>
     <div class="form-group">
        <div class="col-lg-6">
         <label for="district" class="control-label col-lg-6">District Name</label>
        <select class=" form-control" name="district" id="stateSel" size="1">
        <option value="" selected="selected">Please select Division first</option>
    </select>
      </div>
        </div>

       <div class="form-group">
        <div class="col-lg-6">
         <label for="thana" class="control-label col-lg-6">Thana/Upozilla</label>
       <select class=" form-control" name="thana" id="districtSel" size="1">
        <option value="" selected="selected">Please select District first</option>
    </select>
      </div>
        </div>
 
        <div class="form-group">
        <div class="col-lg-6">
         <label for="uname" class="control-label col-lg-6">Union/Word Name.</label>
          <input class=" form-control" id="uname" name="uname" type="text" />
        </div>
        </div>
             <div class="form-group">
        <div class="col-lg-6">
         <label for="poffice" class="control-label col-lg-6">Post Office Name</label>
          <input class=" form-control" id="poffice" name="poffice" type="text" />
        </div>
        </div>
        <div class="form-group">
        <div class="col-lg-6">
         <label for="hnumber" class="control-label col-lg-6">House Number/Flat No.</label>
          <input class=" form-control" id="hnumber" name="hnumber" type="text" />
        </div>
        </div>
           <div class="form-group">
        <div class="col-lg-6">
         <label for="villname" class="control-label col-lg-6">Village name/Area Name.</label>
          <input class=" form-control" id="villname" name="villname" type="text" />
        </div>
        </div>
    


            <div class="form-group">
        <div class="col-lg-12">
        <label  class="control-label col-lg-6"></label>
         
         <br>
         <div class="row">
             <div class="col-md-5"></div>
             <div class="col-md-5"></div>
             <div class="col-md-2">{!!Form::submit('Add Mother',['class'=>'btn btn-primary'])!!}</div>
         </div>
         
        </div>
        </div>
</div>
<br><br>

    {!!Form::close()!!}
  </div>
</div>




                
    
            </div>
        </div>



@else
    <h2>Not Logged In!</h2>
    @endif
@stop