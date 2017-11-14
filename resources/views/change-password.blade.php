@extends('layouts.main')

@section('style')
    <style>
        /*  bhoechie tab */
        div.bhoechie-tab-container{
            z-index: 10;
            background-color: #ffffff;
            padding: 0 !important;
            border-radius: 4px;
            -moz-border-radius: 4px;
            border:1px solid #ddd;
            margin-top: 20px;
            margin-left: 50px;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
            margin-bottom: 50px;
        }
        div.bhoechie-tab-menu{
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a .glyphicon,
        div.bhoechie-tab-menu div.list-group>a .fa {
        color: #5A55A3;
        }
        div.bhoechie-tab-menu div.list-group>a:first-child{
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a:last-child{
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a.active,
        div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group>a.active .fa{
        background-color: #5A55A3;
        background-image: #5A55A3;
        color: #ffffff;
        }
        div.bhoechie-tab-menu div.list-group>a.active:after{
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #5A55A3;
        }

        div.bhoechie-tab-content{
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 20px;
        padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active){
        display: none;
        }
    </style>
@endsection

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
    <!--Page Profile Start-->
    <section class="tl-properties-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 bhoechie-tab-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="{{ url('profile') }}" class="list-group-item text-center">
                                <h4 class="glyphicon glyphicon-plane"></h4><br/>Profil
                            </a>

                            <a href="#" class="list-group-item active text-center">
                                <h4 class="glyphicon glyphicon-road"></h4><br/>Ubah Kata Sandi
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                        <div class="bhoechie-tab-content active">
                            <center>
                                <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                                <h2 style="margin-top: 0;color:#55518a">Ubah Kata Sandi</h2>

                                <form method="POST" action="{{ url('change-password') }}" class="tl-contact-form" style="margin-top: 50px;">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <label for="">Kata Sandi Lama</label>
                                            </div><!--Inner Holder End-->
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <input type="password" name="old_password">
                                            </div><!--Inner Holder End-->
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <label for="">Kata Sandi Baru</label>
                                            </div><!--Inner Holder End-->
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <input type="password" name="password">
                                            </div><!--Inner Holder End-->
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <label for="">Konfirmasi Ulang Kata Sandi</label>
                                            </div><!--Inner Holder End-->
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <!--Inner Holder Start-->
                                            <div class="inner-holder">
                                                <input type="password" name="password_confirmation">
                                            </div><!--Inner Holder End-->
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 30px 0px">
                                            <div class="inner-holder">
                                                <button class="btn-submit" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Profile End-->
@endsection

@section('script')
@endsection