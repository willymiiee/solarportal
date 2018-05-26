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

        .error {
            color: red;
            font-size: 11px;
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
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="main col-12">
                <h1 class="text-center">Kalkulator Listrik Surya Atap</h1>

                <div class="progress">
                    <div id="p" class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" ariavaluemax="100"></div>
                </div>

                <div class="block1">
                    <div id="b1" class="text-center activecirculo">
                        <i class="icon1 fa fa-check"></i>
                    </div>
                </div>

                <div id="block2A" class="block2">
                    <div id="b2" class="text-center circulo">
                        <i class="icon2"></i>
                    </div>
                </div>

                <div id="block3A" class="block3">
                    <div id="b3" class="text-center circulo">
                        <i class="icon3"></i>
                    </div>
                </div>

                <div class="mt-3">
                    <form id="quote-form">
                        <div class="form-group">
                            <label for="">Alamat</label>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <select name="province" id="province" class="form-control select2" data-placeholder="Pilih Provinsi" required>
                                    <option disabled selected>Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col">
                                <select name="regency" id="regency" class="form-control select2" data-placeholder="Pilih Kabupaten" required>
                                    <option disabled selected>Pilih Kabupaten</option>
                                </select>
                            </div>

                            <div class="col">
                                <select name="district" id="district" class="form-control select2" data-placeholder="Pilih Kecamatan" required>
                                    <option disabled selected>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Tagihan PLN per bulan (Rupiah)</label>
                            <input type="text" id="tagihan" name="tagihan" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="this.value=addThousandsSeparator(this.value)" required>
                        </div>

                        <div class="form-group">
                            <label for="">Kapasitas (kW atau kVA)</label>
                            <input type="text" id="kapasitas" name="kapasitas" class="form-control"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="this.value=addThousandsSeparator(this.value)" required>
                        </div>

                        <!--Just to test!!!-->
                        <div class="text-center next">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>

                    <div class="text-center" id="loading">
                        <i class="fa fa-spinner fa-4x fa-spin"></i>
                        <br>
                        <h3 class="mt-2">Silahkan tunggu proses perhitungan...</h3>
                    </div>

                    <div class="px-4 py-2" id="result">
                        <form action="" class="form-horizontal">
                            <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Tagihan PLN per bulan (Rupiah)</label>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label" id="tagihan-result"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Kapasitas (kW atau kVA)</label>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label" id="kapasitas-result"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-6 col-form-label">Potensi Penghematan</label>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label" id="saving"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

    <script>
        function addThousandsSeparator(x) {
            //remove commas
            retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

            //apply formatting
            return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $(function() {
            let provinceId, regencyId

            $('.select2').select2()
            $('#loading').hide()
            $('#result').hide()

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

            $('#quote-form').validate({
                rules: {
                    province: {
                        required: true
                    },
                    regency: {
                        required: true
                    },
                    district: {
                        required: true
                    },
                    tagihan: {
                        required: true
                    },
                    kapasitas: {
                        required: true
                    }
                },
                messages: {
                    province: "Silahkan pilih provinsi",
                    regency: "Silahkan pilih kabupaten",
                    district: "Silahkan pilih kecamatan",
                    tagihan: "Silahkan masukkan total tagihan",
                    kapasitas: "Silahkan masukkan kapasitas"
                },
                submitHandler: function (form) {
                    $('#block2A').addClass('activeblock2')
                    $('#b2').addClass('activecirculo')
                    $('#p').addClass('progreso1')
                    $('#quote-form').hide()
                    $('#loading').show()

                    let data = $('#quote-form').serializeArray()
                    $.post("{{ route('api.quote') }}", data)
                        .then((res) => {
                            setTimeout(function() {
                                $('#block3A').addClass('activeblock3')
                                $('#b3').addClass('activecirculo')
                                $('#p').addClass('progreso2')
                                $('.icon2').addClass('fa fa-check')
                                $('.icon3').addClass('fa fa-check')
                                $('#loading').hide()
                                $('#tagihan-result').html('Rp. ' + $('#tagihan').val())
                                $('#kapasitas-result').html($('#kapasitas').val())
                                $('#saving').html('Rp. ' + Number(res).toLocaleString('en'))
                                $('#result').show()
                            }, 3000, res)
                        })
                    return false
                }
            })
        })
    </script>
@stop
