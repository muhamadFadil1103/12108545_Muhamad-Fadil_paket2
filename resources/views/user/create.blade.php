@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('user') }}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah User</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" required="required" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control" name="level" required="required">
                  <option value="">-- Pilih User Level --</option>
                  <option value="administrator">administrator</option>
                  <option value="petugas">petugas</option>
                </select>
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('user') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection