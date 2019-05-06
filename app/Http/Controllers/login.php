<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\tbl_login;


class login extends Controller
{
    public function index()
    {
    	return view('Login');
    }
    public function masuk(Request $request)
    {
    	$rules = [
    		'username' => 'required',
    		'password' => 'required'
    	];
    	$costume = [
    		'username.required' => 'Username tidak boleh kosong !',
    		'password.required' => 'Password tidak boleh kosong !'
    	];
    	$this->validate($request,$rules,$costume);
    	$where = array(
    		'username' => $request->username,
    		'password' => $request->password
    	);
    	$cek = tbl_login::where($where)->count();
    	$data = tbl_login::where($where)->first();
    	if ($cek > 0) {
    		Session::put('nama',$data->name);
    		return redirect('dashboard');
    	}else{
    		return back()->withMessage('Username atau Password salah !');
    	}
    }
    public function keluar()
    {
    	Session::flush();
    	return redirect('/');
    }
}
