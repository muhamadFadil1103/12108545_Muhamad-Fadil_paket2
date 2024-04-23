<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DetailPenjualan extends Model
{
    protected $table = "detailpenjualan";
	protected $primaryKey = 'DetailID';
    public $timestamps = false;

    public function produk()
	{
	    return $this->belongsTo(Produk::class, 'ProdukID', 'ProdukID');
	}
}