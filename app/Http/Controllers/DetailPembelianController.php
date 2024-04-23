<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pembelian;
Use App\Models\Supplier;
Use App\Models\Produk;
Use App\Models\DetailPembelian;

class DetailPembelianController extends Controller
{
    public function store(Request $req)
   {
   	$simpan = new DetailPembelian;
   	$simpan->PembelianID = $req->PembelianID;   
      $simpan->ProdukID = $req->ProdukID; 
      $simpan->JumlahProduk = $req->JumlahProduk; 

      $harga = info_produk($req->ProdukID)['harga'];
      $Subtotal = $harga * $req->JumlahProduk;
      $simpan->Subtotal = $Subtotal; 
   	$save = $simpan->save();      

   	if($save){
         update_total_harga_pembelian($req->PembelianID);
         update_plus_produk($req->ProdukID, $req->JumlahProduk);
         return redirect()->back()->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = Pembelian::find($id);
      $supplier = Supplier::all();
   	return view($this->dir.'.edit', compact('data', 'supplier'));
   }

   public function destroy($id)
   {
      
      $data = DetailPembelian::find($id);
      $id_pembelian = $data->PembelianID;
      $ProdukID = $data->ProdukID;
      $JumlahProduk = $data->JumlahProduk;
      $delete = $data->delete();
      if($delete) {
         update_total_harga_pembelian($id_pembelian);
         update_min_produk($ProdukID, $JumlahProduk);
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }

}
