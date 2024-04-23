@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('penjualan') }}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Penjualan</h5>
            <br>
            {{-- <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tanggal Penjualan</label>
              <div class="col-sm-6">
                <input type="date" class="form-control" name="TanggalPenjualan" required="required">
              </div>
            </div> --}}

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Pembeli</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="Pembeli">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 control-label col-form-label"><small>Atau Pilih Pelanggan</small></label>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Pelanggan</label>
              <div class="col-sm-7">
                <select name="PelangganID" class="form-control">
                  <option value="">-- Pilih Pelanggan --</option>
                  @if (@$pelanggan!=null)
                    @foreach ($pelanggan as $s)
                      <option value="{{ $s->PelangganID }}">{{ $s->NamaPelanggan }}</option>
                    @endforeach      
                  @endif
                </select>
              </div>
              <div class="col-sm-2">
                <a href="{{ url('pelanggan/create') }}" class="btn btn-info btn-sm">Baru</a>
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