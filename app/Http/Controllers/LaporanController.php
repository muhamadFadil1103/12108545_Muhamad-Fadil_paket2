<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pelanggan;
Use App\Models\Penjualan;
Use App\Models\Pembelian;
Use App\Models\Produk;
Use App\Models\Supplier;
Use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class LaporanController extends Controller
{
    function penjualan(Request $req)
    { 
        $dari_tanggal = @$req->dari_tanggal;
        $sampai_tanggal = @$req->sampai_tanggal;
        if ($dari_tanggal!='' && $sampai_tanggal!='') {
          $data = Penjualan::whereDate('TanggalPenjualan', '>=', $dari_tanggal)->whereDate('TanggalPenjualan', '<=', $sampai_tanggal)->get();
        }else {
          $data = null;
        }
        return view('laporan.laporan_penjualan', compact('data'));
    }

    function penjualan_excel(Request $req)
    { 
        $dari_tanggal = @$req->dari_tanggal;
        $sampai_tanggal = @$req->sampai_tanggal;
        if ($dari_tanggal!='' && $sampai_tanggal!='') {
          $data = Penjualan::whereDate('TanggalPenjualan', '>=', $dari_tanggal)->whereDate('TanggalPenjualan', '<=', $sampai_tanggal)->get();

          $nama_file = 'laporan_penjualan '.date('d-m-Y', strtotime($dari_tanggal)).' sd '.date('d-m-Y', strtotime($sampai_tanggal)).'.xlsx';

          return (new FastExcel($data))->download($nama_file, function ($d) {
                return [
                    'Tanggal Penjualan' => date('d-m-Y', strtotime(@$d->TanggalPenjualan)),
                    'Nama Pembeli' => @$d->Pembeli .' '. @$d->pelanggan->NamaPelanggan,
                    'Total' => @$d->TotalHarga,
                ];
            });
        }
    }

    function pembelian(Request $req)
    { 
        $dari_tanggal = @$req->dari_tanggal;
        $sampai_tanggal = @$req->sampai_tanggal;
        if ($dari_tanggal!='' && $sampai_tanggal!='') {
          $data = Pembelian::whereDate('TanggalPembelian', '>=', $dari_tanggal)->whereDate('TanggalPembelian', '<=', $sampai_tanggal)->get();
        }else {
          $data = null;
        }
        return view('laporan.laporan_pembelian', compact('data'));
    }

    function pembelian_excel(Request $req)
    { 
        $dari_tanggal = @$req->dari_tanggal;
        $sampai_tanggal = @$req->sampai_tanggal;
        if ($dari_tanggal!='' && $sampai_tanggal!='') {
          $data = Pembelian::whereDate('TanggalPembelian', '>=', $dari_tanggal)->whereDate('TanggalPembelian', '<=', $sampai_tanggal)->get();

          $nama_file = 'laporan_pembelian '.date('d-m-Y', strtotime($dari_tanggal)).' sd '.date('d-m-Y', strtotime($sampai_tanggal)).'.xlsx';

          return (new FastExcel($data))->download($nama_file, function ($d) {
                return [
                    'Tanggal Pembelian' => date('d-m-Y', strtotime(@$d->TanggalPembelian)),
                    'Nama Supplier' => @$d->supplier->NamaSupplier,
                    'Total' => @$d->TotalHarga,
                ];
            });
        }
    }
}