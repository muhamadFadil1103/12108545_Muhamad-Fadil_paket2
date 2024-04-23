<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pembelian;
Use App\Models\Supplier;
Use App\Models\Produk;
Use App\Models\DetailPembelian;

class PembelianController extends Controller
{
   protected $dir = 'pembelian';

   public function index()
   {
   	$data = Pembelian::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
      $supplier = Supplier::all();
   	return view($this->dir.'.create', compact('supplier'));
   }

   public function store(Request $req)
   {
   	$simpan = new Pembelian;
   	$simpan->TanggalPembelian = $req->TanggalPembelian;  
      $simpan->SupplierID = $req->SupplierID;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
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

    public function update(Request $req, $id)
   {
      $simpan = Pembelian::find($id);
      $simpan->TanggalPembelian = $req->TanggalPembelian;  
      $simpan->SupplierID = $req->SupplierID;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      $data = Pembelian::find($id);
      $delete = $data->delete();
      if($delete) {

         $detail = DetailPembelian::where('PembelianID', $id)->get();

         foreach ($detail as $d) {
            update_min_produk($d->ProdukID, $d->JumlahProduk);
            $hapus_detail = DetailPembelian::find($d->DetailID);
            $hapus_detail->delete();
         }

         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }


   public function detail(Request $req, $id)
   {
      $data_pembelian = Pembelian::find($id);
      $produk = Produk::all();
      $detail = DetailPembelian::where('PembelianID', $id)->get();
      return view($this->dir.'.detail', compact('data_pembelian', 'produk', 'detail'));
   }
}
