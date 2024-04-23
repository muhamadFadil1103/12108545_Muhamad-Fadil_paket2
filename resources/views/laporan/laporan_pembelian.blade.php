@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-12">
      <div class="card">
        <form class="form-horizontal" action="{{ url('laporan_pembelian') }}" method="get">
          {{ csrf_field() }}
          <div class="card-body">
            <table style="font-size: 12px;" cellpadding="4">
              <tr>
                <th>Dari Tanggal</th>
                <td></td>
                <td><input name="dari_tanggal" value="{{ @$_GET['dari_tanggal'] }}" required="required" type="date" name=""></td>
              </tr>

              <tr>
                <th>Sampai Tanggal</th>
                <td></td>
                <td><input name="sampai_tanggal" value="{{ @$_GET['dari_tanggal'] }}" required="required" type="date" name=""></td>
              </tr>

              <tr>
                <td colspan="3"><button class="btn btn-sm btn-primary" type="submit">Tampilkan data</button></td>
              </tr>
            </table>

           
            @if(@$data!=null)
             <a style="float: right;" target="_blank" href="{{ url('laporan_pembelian/excel?dari_tanggal=').@$_GET['dari_tanggal'].'&sampai_tanggal='.@$_GET['sampai_tanggal'] }}" class="btn btn-sm btn-success text-white">Export Excel</a>
              <table width="100%" border="1" cellspacing="0" cellpadding="4">
                <tr>
                  <th>No</th>
                  <th>Tanggal Pembelian</th>
                  <th>Nama Supplier</th>
                  <th>Total</th>
                </tr>
                @php
                  $no = 1;
                @endphp
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                     <td>{{ tanggal_indo(@$d->TanggalPembelian); }}</td>
                      <td>{{ @$d->supplier->NamaSupplier; }}</td>
                      <td>{{ rupiah(@$d->TotalHarga) }}</td>
                  </tr>
              @endforeach
              </table>
              
            @endif
          </div>
          
        </form>
      </div>
    </div>
  </div> 
@endsection