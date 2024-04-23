<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Supplier;

class SupplierController extends Controller
{
   protected $dir = 'supplier';

   public function index()
   {
   	$data = Supplier::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
   	$simpan = new Supplier;
   	$simpan->NamaSupplier = $req->NamaSupplier;  
      $simpan->Alamat = $req->Alamat;   
      $simpan->NomorTelepon = $req->NomorTelepon;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   		// return redirect()->to('mobil');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   		// return "error";
   	}
   }

   public function edit($id)
   {
   	$data = Supplier::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      $simpan = Supplier::find($id);
      $simpan->NamaSupplier = $req->NamaSupplier;  
      $simpan->Alamat = $req->Alamat;   
      $simpan->NomorTelepon = $req->NomorTelepon;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
         // return "error";
      }
   }

   public function destroy($id)
   {
      $data = Supplier::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
         // return "Gagal menghapus";
      }
   }
}
