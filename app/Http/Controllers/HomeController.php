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

class HomeController extends Controller
{
	public function index()
	{
		$total_pelanggan = Pelanggan::all()->count();
		$total_penjualan = Penjualan::all()->count();
		$total_pembelian = Pembelian::all()->count();
		$total_produk = Produk::all()->count();
		$total_supplier = Supplier::all()->count();
		$total_user = User::all()->count();
		return view('home.index', compact('total_pelanggan', 'total_penjualan', 'total_pembelian', 'total_produk', 'total_supplier', 'total_user'));
	}
}