<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;

class InvoiceController extends Controller
{
    public function generateInvoicePDF($id)
    {
        $penjualan = Penjualan::find($id);
        $detailPenjualan = DetailPenjualan::where('PenjualanID', $id)->get();
        $invoice = PDF::loadview('invoice', [
            'penjualan' => $penjualan,
            'detailPenjualan' => $detailPenjualan,
        ]);

        return $invoice->download('Invoice Penjualan ' .@$penjualan->Pembeli. ' '. @$penjualan->pelanggan->NamaPelanggan . '.pdf');
    }
}
