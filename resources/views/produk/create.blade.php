@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('produk') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Produk</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama produk</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NamaProduk" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Harga</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="Harga" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Stok</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="Stok" required="required">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Gambar Produk</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="GambarProduk" required="required" accept="image/png, image/gif, image/jpeg">
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('produk') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection