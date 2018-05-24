@extends('layouts.new')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <style>
        .container h1 {
            margin: 35px;
            padding: 35px;
        }

        .container .main {
            /* height: 50%; */
        }

        .container .main .progress {
            margin: 20px;
            height: 10px;
            background-color: #eeeeee;
        }

        .container .main .progress .progress-bar {
            height: 15px;
            color: #eeeeee;
        }

        .container .main .progreso1 {
            transition-delay: 4s;
            transition: all 0.45s ease-in-out;
            width: 48%;
            animation: 0.5s;
            background-color: #66ccff;
        }

        .container .main .progreso2 {
            width: 100%;
            animation: 0.5s;
            background-color: #66ccff;
            transition: all 0.45s ease;
        }

        .container .main .block1 {
            position: relative;
            margin: 0 0%;
            border-radius: 50%;
            background-color: #66ccff;
            height: 50px;
            width: 50px;
            top: 0px;
            padding: 4px;
            margin-top: -50px;
        }

        .container .main .block2 {
            position: relative;
            margin: 0 47.5%;
            border-radius: 50%;
            background-color: #eeeeee;
            height: 50px;
            width: 50px;
            top: 0px;
            padding: 4px;
            margin-top: -50px;
        }

        .container .main .block3 {
            position: relative;
            margin: 0 95%;
            border-radius: 50%;
            background-color: #eeeeee;
            height: 50px;
            width: 50px;
            top: 0px;
            padding: 4px;
            margin-top: -50px;
        }

        .container .main .circulo {
            border-radius: 50%;
            height: 30px;
            width: 30px;
            background-color: #eeeeee;
            top: 0px;
            margin: 6px;
        }

        .container .main .fa-check {
            font-size: 14px;
            color: #fff;
            padding: 2.5px;
        }

        .container .main .activeblock2 {
            position: relative;
            margin: 0 47.5%;
            border-radius: 50%;
            background-color: #66ccff !important;
            height: 50px;
            width: 50px;
            top: 0px;
            padding: 4px;
            margin-top: -50px;
        }

        .container .main .activeblock3 {
            position: relative;
            margin: 0 95%;
            border-radius: 47.5%;
            background-color: #66ccff;
            height: 50px;
            width: 50px;
            top: 0px;
            padding: 4px;
            margin-top: -50px;
        }

        .container .main .activecirculo {
            border-radius: 50%;
            height: 30px;
            width: 30px;
            background-color: #66ccff;
            border: solid 4px #fff;
            margin: 6px;
        }

        @media (max-width: 768px) {
            .container h1 {
                font-size: 25px;
            }

            .container .main .block2 {
                margin: 0 42.5%;
                margin-top: -50px;
            }

            .container .main .activeblock2 {
                margin: 0 42.5%;
                margin-top: -50px;
            }

            .container .main .block3 {
                margin: 0 90%;
                margin-top: -50px;
            }

            .container .main .activeblock3 {
                margin: 0 90%;
                margin-top: -50px;
            }
        }

        @media (min-width: 510px) and (max-width: 600px) {
        }

        @media (min-width: 368px) and (max-width: 509px) {
            .container .main .block3 {
                margin: 0 85%;
                margin-top: -50px;
            }

            .container .main .activeblock3 {
                margin: 0 85%;
                margin-top: -50px;
            }
        }

        @media (min-width: 200px) and (max-width: 367px) {
            .container .main .block3 {
                margin: 0 83%;
                margin-top: -50px;
            }

            .container .main .activeblock3 {
                margin: 0 83%;
                margin-top: -50px;
            }
        }

        /**
        This is just to test, but you don't need it.
        */
        .next {
            margin: 50px 0;
        }

        .next .next2 {
            display: none;
        }

        .next .next3 {
            display: none;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="main col-12">
                <h1 class="text-center">Kalkulator Listrik Surya Atap</h1>

                <div class="progress">
                    <div id="p" class="progress-bar bg-info {{ $step > 1 ? ($step == 2 ? 'progreso1' : 'progreso2') : '' }}" role="progressbar" aria-valuenow="0" aria-valuemin="0" ariavaluemax="100"></div>
                </div>

                <div class="block1">
                    <div id="b1" class="text-center activecirculo">
                        <i class="icon1 fas fa-check"></i>
                    </div>
                </div>

                <div id="block2A" class="{{ $step == 2 ? 'active' : '' }}block2">
                    <div id="b2" class="text-center {{ $step == 2 ? 'active' : '' }}circulo">
                        <i class="icon2 {{ $step == 2 ? 'fas fa-check' : '' }}"></i>
                    </div>
                </div>

                <div id="block3A" class="{{ $step == 3 ? 'active' : '' }}block3">
                    <div id="b3" class="text-center {{ $step == 3 ? 'active' : '' }}circulo">
                        <i class="icon3 {{ $step == 3 ? 'fas fa-check' : '' }}"></i>
                    </div>
                </div>

                <div class="mt-3">
                    @if ($step == 1)
                    <form action="">
                        <div class="form-group">
                            <label for="">Alamat</label>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <select name="province" id="province" class="form-control select2" data-placeholder="Pilih Provinsi">
                                    <option disabled selected>Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col">
                                <select name="regency" id="regency" class="form-control select2" data-placeholder="Pilih Kabupaten">
                                    <option disabled selected>Pilih Kabupaten</option>
                                </select>
                            </div>

                            <div class="col">
                                <select name="district" id="district" class="form-control select2" data-placeholder="Pilih Kecamatan">
                                    <option disabled selected>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Tagihan PLN per bulan (Rupiah)</label>
                            <input type="text" id="listrik" name="listrik" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>

                        <div class="form-group">
                            <label for="">Kapasitas (kW atau kVA)</label>
                            <input type="text" id="kapasitas" name="kapasitas" class="form-control"  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                    </form>
                    @endif
                </div>

                <!--Just to test!!!-->
                <div class="text-center next">
                    <button onclick="enviar()" id="next1" class="next1 btn btn-primary">Next</button>
                    <button onclick="enviar2()" id="next2" class="next2 btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            let provinceId, regencyId

            $('.select2').select2()

            $.get("{{ route('api.provinces') }}")
                .then((res) => {
                    let result = $.map(res, function(obj) {
                        return {id: obj.id, text: obj.name}
                    })

                    $('#province').select2({
                        data: result
                    })
                })

            $('#province').on('select2:select', function(e) {
                $('#regency').empty().append($('<option>').text('Pilih Kabupaten').attr('disabled', 'true').attr('selected', 'true'));

                let data = e.params.data
                let url = "{{ route('api.regencies', ':provinceId') }}"
                provinceId = data.id
                url = url.replace(':provinceId', provinceId)

                $.get(url)
                    .then((res) => {
                        let result = $.map(res, function(obj) {
                            return {id: obj.id, text: obj.name}
                        })

                        $('#regency').select2({
                            data: result
                        })
                    })
            })

            $('#regency').on('select2:select', function(e) {
                $('#district').empty().append($('<option>').text('Pilih Kecamatan').attr('disabled', 'true').attr('selected', 'true'));

                let data = e.params.data
                let url = "{{ route('api.districts', [':provinceId', ':regencyId']) }}"
                regencyId = data.id
                url = url.replace(':provinceId', provinceId).replace(':regencyId', regencyId)

                $.get(url)
                    .then((res) => {
                        let result = $.map(res, function(obj) {
                            return {id: obj.id, text: obj.name}
                        })

                        $('#district').select2({
                            data: result
                        })
                    })
            })
        })
    </script>
@stop
