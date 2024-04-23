<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function index()
   {
   	return view('login.index');
   }


   public function login_proses(Request $req)
   {
      $username = $req->username;
      $password = $req->password;

      $user = User::where('username', $username)->first();
      if($user){
         if (Hash::check($password, $user->password)) {
               $req->session()->put('user_id',$user->id);
               $req->session()->put('level',$user->level);

               return redirect('/beranda');
         }else{
             return redirect()->back()->with('error','Password yang anda masukkan salah!');
         }
      }else {
         return redirect()->back()->with('error','Username anda tidak ditemukan!');
      }
   }

   public function logout()
   {
   	Session::forget('user_id');
   	Session::forget('role_id');
   	return redirect('login');
   }

}