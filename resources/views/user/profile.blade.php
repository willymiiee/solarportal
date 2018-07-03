@extends('user.layout')

@section('content')
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Profil</h3>
      </div>

      <form method="POST" action="{{ route('user.update-profile') }}">
        {{ csrf_field() }}

        <div class="box-body">
          <div class="form-group">
            <label for="">Nama</label>
            <input name="name" type="text" class="form-control" value="{{ $user->name }}">
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input name="email" type="text" class="form-control" value="{{ $user->email }}" readonly>
          </div>

          <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input name="phone" type="text" class="form-control" value="{{ $user->phone }}">
          </div>

          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="address" rows="3" class="form-control" placeholder="Alamat Anda" style="resize: none">
              {{ $user->address }}
            </textarea>
          </div>
        </div>

        <div class="box-footer">
          <button id="submit-btn" class="btn btn-primary" type="submit">Ubah</button>
        </div>
      </form>
    </div>
  </div>
@stop
