<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pelanggan;

class PelangganController extends Controller
{
   protected $dir = 'pelanggan';

   public function index()
   {
   	$data = Pelanggan::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
   	$simpan = new Pelanggan;
   	$simpan->NamaPelanggan = $req->NamaPelanggan;  
      $simpan->Alamat = $req->Alamat;   
      $simpan->NomorTelepon = $req->NomorTelepon;
   	$save = $simpan->save();
   	if($save){
         return redirect()->back()->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = Pelanggan::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      $simpan = Pelanggan::find($id);
      $simpan->NamaPelanggan = $req->NamaPelanggan;  
      $simpan->Alamat = $req->Alamat;   
      $simpan->NomorTelepon = $req->NomorTelepon;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      $data = Pelanggan::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }
}
