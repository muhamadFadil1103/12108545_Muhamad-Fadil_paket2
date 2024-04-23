
<?php 

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	echo $hasil_rupiah;
 
}


function tanggal_indo($tgl)
{
	if ($tgl!='') {
		return date('d-m-Y', strtotime($tgl));
	}else {
		return '-';
	}
}

function info_produk($id){
	$data = App\Models\Produk::find($id);
	$harga = @$data->Harga;
	$nama_produk = @$data->NamaProduk;
	return ['harga'=>$harga, 'nama_produk'=>$nama_produk];
}

function info_user($id){
	$data = App\Models\User::find($id);
	$nama = @$data->nama;
	$level = @$data->level;
	return ['nama'=>$nama, 'level'=>$level];
}


function update_total_harga_pembelian($id)
{
	$detail = App\Models\DetailPembelian::where('PembelianID', $id)->get();
	$total = 0;
	foreach ($detail as $d) {
		$total += $d->Subtotal;	
	}

	$data_pembelian = App\Models\Pembelian::find($id);
	$data_pembelian->Totalharga = $total;
	$data_pembelian->save();
}

function update_plus_produk($id_produk, $jumlah_produk)
{
	$produk = App\Models\Produk::find($id_produk);
	$stok_sekarang = $produk->Stok;
	$stok_baru = $stok_sekarang + $jumlah_produk;
	$produk->Stok = $stok_baru;
	$produk->save();
}

function update_min_produk($id_produk, $jumlah_produk)
{
	$produk = App\Models\Produk::find($id_produk);
	$stok_sekarang = $produk->Stok;
	$stok_baru = $stok_sekarang - $jumlah_produk;
	$produk->Stok = $stok_baru;
	$produk->save();
}

function update_total_harga_penjualan($id)
{
	$detail = App\Models\DetailPenjualan::where('PenjualanID', $id)->get();
	$total = 0;
	foreach ($detail as $d) {
		$total += $d->Subtotal;	
	}

	$data_pembelian = App\Models\Penjualan::find($id);
	$data_pembelian->Totalharga = $total;
	$data_pembelian->save();
}