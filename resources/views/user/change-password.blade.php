@extends('user.layout')

@section('content')
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Ubah Password</h3>
      </div>

      <form method="POST" action="{{ route('user.update-password') }}">
        {{ csrf_field() }}

        <div class="box-body">
          <div class="form-group">
            <label for="">Kata Sandi Lama</label>
            <input type="password" name="old_password" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Kata Sandi Baru</label>
            <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Konfirmasi Ulang Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
        </div>

        <div class="box-footer">
          <button id="submit-btn" class="btn btn-primary" type="submit">Ubah</button>
        </div>
      </form>
    </div>
  </div>
@stop
