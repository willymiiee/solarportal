@extends('layouts.main')

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
    <!--Page Register Thankyou Start-->
    <section class="tl-properties-section">
        <div class="container">
            <div class="row" style="padding: 50px 0">
                <h2 style="margin-bottom: 30px">Registration Success</h2>

                <p>Thank you for signing up.</p>
                <p>Please check your email & activate your account.</p>
            </div>
        </div>
    </section>
    <!--Page Register Thankyou End-->
@endsection

@section('script')
@endsection