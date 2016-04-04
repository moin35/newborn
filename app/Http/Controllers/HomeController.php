<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Auth;
use App\T1;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\TblMother;
use App\MessageApi;
class HomeController extends Controller
{
    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
    public function getlogin(){
    if(Auth::check())
    {
        return Redirect::to('dashboard');
    }
    else
    {
        return view('login');
    }  
    
    }

    public function postlogin(){
        
        if(Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('pass')])){
            if(Auth::check()){
                return Redirect::to('dashboard');
            }
        }
        else
        {
            return 'Login failed.';
        }
    }

    public function index(){
        if(Auth::check())
        {
            return view('welcome');
        }
        else
        {
            return 'not logged in!';
        }
    }

    public function getadd(){
        $ry = User::all();
        return view('add')->with('v',$ry);
    }
    public function postadd(){
        if(Auth::check()){
        $email=Input::get('email');
        $name = Input::get('name');
        $pass=Hash::make(Input::get('password'));
        $nn = new User;
        $nn->name=$name;
        $nn->email=$email;
        $nn->password=$pass;

        $nn->save();
        Session::flash('saved',1);
        return Redirect::to('add');
        }
        else
        {
            return 'not logged in!';
        }
    }

public function getMotherProfile(){
    if (Auth::check()) {
        return view('mother.mreg');
    }
    else{
        Session::flash('data','Login First or You are Not a registerd user');
        return Redirect::to('/');
    }
}
public function postMotherProfile(){
    if (Auth::check()) {
        $mname=Input::get('mname');
        $sname=Input::get('sname');
        $mnid=Input::get('mnid');
        $snid=Input::get('snid');
        $dbirth=Input::get('dbirth');
        $cdate=Input::get('cdate');
        $mmobile=Input::get('mmobile');
        $smobile=Input::get('smobile');
        $division=Input::get('division');
        $district=Input::get('district');
        $thana=Input::get('thana');
        $uname=Input::get('uname');
        $poffice=Input::get('poffice');
        $hnumber=Input::get('hnumber');
        $villname=Input::get('villname');

  
        $add=new TblMother;
        $add->name=$mname;
        $add->spouse=$sname;
        $add->mother_nid=$mnid;
        $add->spouse_nid=$snid;
        $add->date_of_birth=$dbirth;
        $add->conceive_date=$cdate;
        $add->mother_mobile=$mmobile;
        $add->spouse_mobile=$smobile;
        $add->division=$division;
        $add->district=$district;
        $add->thana=$thana;
        $add->union=$uname;
        $add->post_office=$poffice;
        $add->home_no=$hnumber;
        $add->village_name=$villname;
       //$add->save();
            Session::flash('data','Information Successfully Added !');
        return Redirect::to('mother/signup');
    }
    else{
        Session::flash('data','Login First or You are Not a registerd user');
        return Redirect::to('/');
    }
}
public function getTestMsgBox(){
    $view=MessageApi::all();
    //return $view;
    return view('msgtest',['v'=>$view]);
}
public function postTestMsgBox(){
    $name=Input::get('name');
    $phone=Input::get('phone');
    $msg=Input::get('msg');

    $namehex='';
    $phonehex='';
    $msghex='';
    for ($i=0; $i < strlen($name); $i++){
        $namehex .= dechex(ord($name[$i]));
    }
     for ($i=0; $i < strlen($phone); $i++){
        $phonehex .= dechex(ord($phone[$i]));
    }
     for ($i=0; $i < strlen($msg); $i++){
        $msghex .= dechex(ord($msg[$i]));
    }
    $msgphone='';
    //return $namehex.'/'.$phonehex.'/'.$msghex;
    $s=new MessageApi;
    $s->name=$name;
    $s->phone=$phone;
    $s->msg=$msg;
    $s->save();
      Session::flash('data','Information Successfully Send !');
      return Redirect::to('http://www.akashtech.com/6D7367/msg/'.$phonehex.'/'.$msghex);
        //return Redirect::to('send/msg');
    
}
    public function getrud(){
        if(Auth::check())
        {  $ry = T1::all();
        return view('rud')->with('v',$ry);
        }
        else
        {
            return 'not logged in!';
        }
    }
    public function deleterecord($id){
        if(Auth::check())
        { $dq=T1::where('id','=',$id)->delete();
        Session::flash('ds',1);
        return Redirect::to('rud');}else{return 'not logged in!';}
    }
    public function viewrecord($id){
        if(Auth::check()){ $vq =T1::where('id','=',$id)->first();
        return view('details')->with('d',$vq);}else{return 'not logged in!';}
    }
    public function updaterecordg($id){
        if(Auth::check()){
        $vq =T1::where('id','=',$id)->first();
        return view('update')->with('r',$vq);}else{return 'not logged in!';}
    }
    public function updaterecordp($id){
        if(Auth::check()){ $up = T1::where('id','=',$id)->update(['name'=>Input::get('name'),'email'=>Input::get('email')]);
        Session::flash('u',1);
        return Redirect::to('update/'.$id);}else{return 'not logged in!';}
    }
}