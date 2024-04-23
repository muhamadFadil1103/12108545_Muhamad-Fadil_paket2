<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DetailPembelian extends Model
{
    protected $table = "detailpembelian";
	protected $primaryKey = 'DetailID';
    public $timestamps = false;

    public function produk()
	{
	    return $this->belongsTo(Produk::class, 'ProdukID', 'ProdukID');
	}
}