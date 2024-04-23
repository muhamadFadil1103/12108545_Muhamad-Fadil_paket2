<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Penjualan extends Model
{
    protected $table = "penjualan";
	protected $primaryKey = 'PenjualanID';
    public $timestamps = false;

    public function pelanggan()
	{
	    return $this->belongsTo(Pelanggan::class, 'PelangganID', 'PelangganID');
	}
}