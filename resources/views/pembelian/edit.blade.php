@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('pembelian').'/'.@$data->PembelianID }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit Pembelian</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tanggal Pembelian</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" name="TanggalPembelian" value="{{ @$data->TanggalPembelian }}" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Supplier</label>
              <div class="col-sm-9">
                <select name="SupplierID" class="form-control" required="required">
                  <option value="">-- Pilih Supplier --</option>
                  @if (@$supplier!=null)
                    @foreach ($supplier as $s)
                            <option {{ @$data->SupplierID == $s->SupplierID ? 'selected' : '' }} value="{{ $s->SupplierID }}">{{ $s->NamaSupplier }}</option>
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

              <a href="{{ url('pembelian') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection