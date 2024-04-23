<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Hash;

class UserController extends Controller
{
   protected $dir = 'user';

   public function index()
   {
   	$data = User::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
   	$simpan = new User;
   	$simpan->nama = $req->nama;  
      $simpan->username = $req->username;   
      $simpan->password = Hash::make($req->password);
      $simpan->level = $req->level;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = User::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      $simpan = User::find($id);
      $simpan->nama = $req->nama;  
      $simpan->username = $req->username; 
      if($req->password){
         $simpan->password = Hash::make($req->password);
      }  
      $simpan->level = $req->level;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      $data = User::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }
}
