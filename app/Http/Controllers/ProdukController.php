<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Produk;
use Illuminate\Support\Facades\File; 
class ProdukController extends Controller
{
   protected $dir = 'produk';

   public function index()
   {
   	$data = Produk::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
      // menyimpan data file yang diupload ke variabel $file
       $file = $req->file('GambarProduk');
       
       if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'gambar_produk';
            $file->move($tujuan_upload,$nama_file);
       }
       


   	$simpan = new Produk;
   	$simpan->NamaProduk = $req->NamaProduk;  
      $simpan->Harga = $req->Harga;   
      $simpan->Stok = $req->Stok;
      if($file){
         $simpan->GambarProduk = $nama_file;    
      }
      
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
   	$data = Produk::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       $file = $req->file('GambarProduk');
       if($file){
         $nama_file = time()."_".$file->getClientOriginalName();
       
                     // isi dengan nama folder tempat kemana file diupload
         $tujuan_upload = 'gambar_produk';
         $file->move($tujuan_upload,$nama_file);  
       }
       

      $simpan = Produk::find($id);
      $simpan->NamaProduk = $req->NamaProduk;  
      $simpan->Harga = $req->Harga;   
      $simpan->Stok = $req->Stok;
      if($file){
         $simpan->GambarProduk = $nama_file;    
      }
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
      $data = Produk::find($id);
      // return $data->GambarProduk;
      if($data->GambarProduk){
         $image_path = public_path('gambar_produk').'/'.$data->GambarProduk;  // 
         if(File::exists($image_path)) {
             File::delete($image_path);
         }   
      }
      

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
