@extends('layouts.new')

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
    <div class="container pt-2 pb-2">
        <div class="row">
            <div class="col-12">
                <h2>Registrasi Sukses!</h2>
                <p>Terima kasih sudah mendaftarkan di portal Gerakan Sejuta Surya Atap.</p>
                <p>Kami sudah mengirimkan e-mail untuk aktivasi akun anda.</p>
                <p>Mohon periksa e-mail anda dan mengklik tautan untuk aktivasi.</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection