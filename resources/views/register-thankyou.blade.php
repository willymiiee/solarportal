@extends('layouts.main')

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
    <!--Page Register Thankyou Start-->
    <section class="tl-properties-section">
        <div class="container">
            <div class="row" style="padding: 50px 0">
                <h2 style="margin-bottom: 30px">Registrasi Sukses!</h2>

                <p>Terima kasih sudah mendaftarkan di portal Gerakan Sejuta Surya Atap.</p>
                <p>Kami sudah mengirimkan e-mail untuk aktivasi akun anda.</p>
                <p>Mohon periksa e-mail anda dan mengklik tautan untuk aktivasi.</p>
            </div>
        </div>
    </section>
    <!--Page Register Thankyou End-->
@endsection

@section('script')
@endsection