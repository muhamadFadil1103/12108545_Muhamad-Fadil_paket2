@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('penjualan').'/'.@$data->PenjualanID }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit Penjualan</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tanggal Penjualan</label>
              <div class="col-sm-6">
                <input type="date" class="form-control" name="TanggalPenjualan" value="{{ @$data->TanggalPenjualan }}" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Pembeli</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="Pembeli" value="{{ @$data->Pembeli }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 control-label col-form-label"><small>Atau Pilih Pelanggan</small></label>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Pelanggan</label>
              <div class="col-sm-9">
                <select name="PelangganID" class="form-control" required="required">
                  <option value="">-- Pilih Pelanggan --</option>
                  @if (@$pelanggan!=null)
                    @foreach ($pelanggan as $s)
                            <option {{ @$data->PelangganID == $s->PelangganID ? 'selected' : '' }} value="{{ $s->PelangganID }}">{{ $s->NamaPelanggan }}</option>
                          @endforeach      
                  @endif
                </select>
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('penjualan') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection