@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-5">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">Detail Pembelian</h5>
          <table cellpadding="7px" cellspacing="0" class="">
            <tr>
              <td>Tanggal Pembelian</td>
              <td>:</td>
              <td>{{ tanggal_indo(@$data_pembelian->TanggalPembelian) }}</td>
            </tr>
            <tr>
              <td>Nama Supplier</td>
              <td>:</td>
              <td>{{ @$data_pembelian->supplier->NamaSupplier }}</td> 
            </tr>
          </table>
        </div>
      </div>
       
    </div>


    
    <div class="col-md-7">
      <div class="card">
        <form class="form-inline" action="{{ url('detailpembelian') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="PembelianID" value="{{ @$data_pembelian->PembelianID }}">
          <div class="card-body">
            <h5 class="card-title">Tambah Produk Yang Dibeli</h5>
            <div class="row">
            <div class="col-md-6">
              <label class=" text-end control-label col-form-label">Nama Produk</label>
              
                <select class="form-control" name="ProdukID" required="required">
                  <option value="">-- Pilih Produk --</option>
                  @if (@$produk!=null)
                    @foreach ($produk as $p)
                      <option value="{{ $p->ProdukID }}">{{ @$p->NamaProduk }}</option>
                    @endforeach
                  @endif
                </select>
            </div>

            <div class="col-md-3">
              <label class="text-end control-label col-form-label">Jumlah Produk</label>
              <input type="number" name="JumlahProduk" required="required" class="form-control">
            </div>

            <div class="col-md-3">
              <button type="submit" style="margin-top: 34px" class="btn btn-primary">
                Submit
              </button>
            </div>
            
          </div>

          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Daftar Produk Pembelian</div>
          <table class="table table-sniped" style="font-size: 12px;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
               @if(@$detail != 'NULL')
                @php
                  $no = 1;
                  $total_semua = 0;
                @endphp
                @foreach($detail as $d)
                  @php
                    $total_semua +=$d->Subtotal;
                  @endphp
                  <tr>
                    <td>{{ @$no++ }}</td>
                    <td>{{ @$d->produk->NamaProduk }}</td>
                    <td>{{ rupiah(@$d->produk->Harga) }}</td>
                    <td>{{ @$d->JumlahProduk }}</td>
                    <td>{{ rupiah(@$d->Subtotal) }}</td>
                    <td>
                      <form id="theFormDetail{{ @$d->DetailID }}" style="float: left; margin-left: 2px" method="POST" action="{{ url('/detailpembelian').'/'.$d->DetailID }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}

                          <div class="form-group">
                              <input type="button" data-id="{{ @$d->DetailID }}" class="btn btn-danger btn-sm delete-detail" value="Hapus">
                          </div>
                      </form>
                    </td>
                  </tr>
                @endforeach
               @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Total Pembelian
          </h5>
          <h2>{{ rupiah(@$total_semua) }}</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <div class="card-body">
        <a href="{{ url('pembelian') }}" class="btn btn-warning">Kembali</a>
      </div>
    </div>
    </div>
  </div> 
@endsection

@section('js')
  <script type="text/javascript">

    $(document).on('click', '.delete-detail', function(){
        var id = $(this).attr('data-id');
        var result = confirm("Anda yakin Akan Menghapus Data Ini?");
        if (result) {
            // document.theForm.submit();
            $("#theFormDetail"+id).submit();
        }  
    });
  </script>
@endsection