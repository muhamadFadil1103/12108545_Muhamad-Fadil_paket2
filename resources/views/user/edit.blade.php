@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('user').'/'.@$data->id }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit User</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required="required" value="{{ @$data->nama }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" required="required" value="{{ @$data->username }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Password Baru</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control" name="level" required="required">
                  <option value="">-- Pilih User Level --</option>
                  <option {{ @$data->level == 'administrator' ? 'selected' : '' }} value="administrator">administrator</option>
                  <option {{ @$data->level == 'petugas' ? 'selected' : '' }} value="petugas">petugas</option>
                </select>
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('supplier') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection