@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('pelanggan').'/'.@$data->PelangganID }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit Pelanggan</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama pelanggan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NamaPelanggan" value="{{ @$data->NamaPelanggan }}" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Alamat" value="{{ @$data->Alamat }}" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nomor Telepon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NomorTelepon" value="{{ @$data->NomorTelepon }}" required="required">
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('pelanggan') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection