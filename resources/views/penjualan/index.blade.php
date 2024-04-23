@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message') }}
          </div>
      @endif
      @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error') }}
        </div>
      @endif
        <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Penjualan</h5>
          <a href="{{ url('penjualan/create') }}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
              <table class="table table-sniped" id="data-tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pembeli</th>
                    <th>Total Harga</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (@$data!=null)
                  @php
                    $no =1;
                  @endphp
                    @foreach ($data as $d)
                      <tr>
                        <td>{{ @$no++; }}</td>
                        <td>{{ tanggal_indo(@$d->TanggalPenjualan); }}</td>
                        <td>{{ @$d->Pembeli .' '. @$d->pelanggan->NamaPelanggan; }}</td>
                        <td>{{ rupiah(@$d->TotalHarga) }}</td>
                        <td>
                          <a style="float: left;" href="{{ url('penjualan').'/'.@$d->PenjualanID.'/edit' }}" class="btn btn-warning btn-sm">Edit</a>

                          <a style="float: left; margin-left: 2px" href="{{ url('penjualan').'/'.@$d->PenjualanID.'/detail' }}" class="btn btn-info btn-sm">Detail</a>

                          <form id="theForm_{{ @$d->PenjualanID }}" style="float: left; margin-left: 2px" method="POST" action="{{ url('/penjualan').'/'.$d->PenjualanID }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <div class="form-group">
                                      <input type="button" data-id="{{ @$d->PenjualanID }}" class="btn btn-danger btn-sm hapus_btn" value="Hapus">
                                  </div>
                              </form>

                          <a style="float: left; margin-left: 2px" href="{{ url('generate-invoice-pdf').'/'.@$d->PenjualanID }}" class="btn btn-info btn-sm">Download Invoice</a>

                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection
