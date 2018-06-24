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
                <h1 class="text-center my-0 pb-1">Kalkulator Listrik Surya Atap</h1>
                <h3 class="text-center pb-3">Pemasangan On Grid (Terkoneksi ke PLN)</h3>

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

                <div class="mt-3 mb-3">
                    <form id="quote-form">
                        <input name="_method" type="hidden" id="method" value="POST">
                        <input type="hidden" name="id" id="quoteId">
                        <input type="hidden" name="user_id" id="userId" value="{{ Auth::check() ? Auth::user()->id : null }}">

                        <div class="form-group">
                            <label for="">Alamat</label>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <select name="province_id" id="province" class="form-control select2" data-placeholder="Pilih Provinsi" required>
                                    <option disabled selected>Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col">
                                <select name="regency_id" id="regency" class="form-control select2" data-placeholder="Pilih Kabupaten" required>
                                    <option disabled selected>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-1">
                            <label for="">Tagihan PLN per bulan (Rupiah)</label>
                            <input type="text" id="tagihan" name="bill" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="this.value=addThousandsSeparator(this.value)" required>
                        </div>

                        <div class="form-group">
                            <label for="">Batas Daya (VA atau Watt)</label>
                            <select name="capacity" id="kapasitas" class="form-control select2">
                                <option disabled selected>Pilih Batas Daya</option>
                                <option value=900>900</option>
                                <option value=1300>1300</option>
                                <option value=2200>2200</option>
                                <option value=3500>3500</option>
                                <option value=5500>5500</option>
                                <option value="Lebih dari 5500">Lebih dari 5500</option>
                            </select>
                        </div>

                        <!--Just to test!!!-->
                        <div class="text-center next">
                            <button type="submit" class="btn btn-primary">Hitung Sekarang</button>
                        </div>
                    </form>

                    <div class="text-center" id="loading">
                        <i class="fa fa-spinner fa-4x fa-spin"></i>
                        <br>
                        <h3 class="mt-2">Silahkan tunggu proses perhitungan...</h3>
                    </div>

                    <div class="px-4" id="result">
                        <form action="" class="form-horizontal">
                            <div id="resultLabel">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Tagihan PLN per bulan (Rupiah)</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="tagihan-result"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Batas Daya (VA atau Watt)</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="kapasitas-result"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Kapasitas Listrik Surya Atap</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="capacity"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Luas atap yang dibutuhkan</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="large"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Estimasi biaya pemasangan</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="cost"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6 col-form-label">Potensi Penghematan</label>
                                    <div class="col-sm-6">
                                        <label for="" class="col-form-label font-weight-bold" id="saving"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row text-center mt-3">
                                @if (!Auth::check())
                                <div class="col">
                                    <button class="btn btn-primary" type="button" id="{{ Auth::check() ? 'printBtn' : 'showDialog' }}">Simpan</button>
                                </div>
                                @endif

                                <div class="col">
                                    <button class="btn btn-primary" type="button" id="requestQuote">Minta Penawaran</button>
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
    <script src="{{ asset('bower_components/html2canvas/html2canvas.min.js') }}"></script>

    <script>
        function addThousandsSeparator(x) {
            //remove commas
            retVal = x ? parseFloat(x.replace(/,/g, '')) : 0

            //apply formatting
            return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
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
                $('#regency').empty().append($('<option>').text('Pilih Kabupaten').attr('disabled', 'true').attr('selected', 'true'))

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

            $('#quote-form').validate({
                rules: {
                    province: {
                        required: true
                    },
                    regency: {
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
                    tagihan: "Silahkan masukkan total tagihan",
                    kapasitas: "Silahkan pilih batas daya"
                },
                submitHandler: function (form) {
                    $('#block2A').removeClass('block2').addClass('activeblock2')
                    $('#b2').removeClass('circulo').addClass('activecirculo')
                    $('#p').addClass('progreso1')
                    $('#quote-form').hide()
                    $('#loading').show()

                    let data = $('#quote-form').serializeArray()
                    $.post("{{ route('api.quote') }}", data)
                        .then((res) => {
                            setTimeout(function() {
                                $('#block3A').removeClass('block3').addClass('activeblock3')
                                $('#b3').removeClass('circulo').addClass('activecirculo')
                                $('#p').removeClass('progreso1').addClass('progreso2')
                                $('.icon2').addClass('fa fa-check')
                                $('.icon3').addClass('fa fa-check')
                                $('#loading').hide()
                                $('#tagihan-result').html('Rp. ' + $('#tagihan').val().replace(/\,/g, '.'))
                                $('#kapasitas-result').html(Number($('#kapasitas').val()).toLocaleString('id') + ' Watt')
                                $('#capacity').html(Number(res.pv_allowed).toLocaleString('id') + ' Watt')
                                $('#large').html(Number(res.roof_area).toLocaleString('id') + ' m²')
                                $('#cost').html('Rp. ' + Number(res.cost).toLocaleString('id'))
                                $('#saving').html('Rp. ' + Number(res.saving).toLocaleString('id'))
                                $('#userId').val(res.user_id)
                                $('#quoteId').val(res.id)
                                $('#method').val('PUT')
                                $('#result').show()
                            }, 3000, res)
                        })
                    return false
                }
            })

            $('#printBtn').click(function(e) {
                e.preventDefault()
                swal(
                    'Sukses menyimpan hasil kalkulator!',
                    'Hasil kalkulator telah disimpan di dalam akun anda!',
                    'success'
                )
            })

            $('#showDialog').click(function(e) {
                e.preventDefault()
                swal({
                    title: 'Silahkan masuk atau mendaftar akun',
                    text: 'Untuk dapat menggunakan fitur ini, anda harus memiliki akun.',
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'Masuk',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonText: 'Daftar',
                    cancelButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        swal({
                            title: 'Login Partisipan',
                            html: '<input id="login-email" class="swal2-input" type="email" placeholder="Masukkan alamat email">' +
                                  '<input id="login-password" class="swal2-input" type="password" placeholder="Masukkan kata sandi">',
                            focusConfirm: false,
                            preConfirm: () => {
                                let email = $('#login-email').val()
                                let pass = $('#login-password').val()

                                if (email && pass) {
                                    let data = [{
                                        name: "email",
                                        value: email
                                    }, {
                                        name: "password",
                                        value: pass
                                    }]

                                    $.post("{{ route('api.check-user') }}", data)
                                        .then((res) => {
                                            let updateData = [{
                                                name: '_method',
                                                value: 'PUT'
                                            }, {
                                                name: 'email',
                                                value: email
                                            }]

                                            $.post("{{ url('api/v1/quote') }}/"+$('#quoteId').val(), updateData)
                                                .then((res) => {
                                                    swal(
                                                        'Sukses menyimpan hasil kalkulator!',
                                                        'Hasil kalkulator telah disimpan di dalam akun anda!',
                                                        'success'
                                                    ).then((res) => {
                                                        $.post("{{ route('alternate-login') }}", data)
                                                            .then((res) => {
                                                                location.reload()
                                                            })
                                                    })
                                                })
                                        }).fail(function(xhr, status, error) {
                                            swal({
                                                title: 'Error!',
                                                type: 'error',
                                                text: 'Email atau password yang anda masukkan salah!'
                                            })
                                        })

                                } else {
                                    swal.showValidationError('Silahkan masukkan alamat email dan password yang valid!')
                                }
                            }
                        })
                    } else {
                        swal({
                            title: 'Daftar Partisipan',
                            text: 'Masukkan email anda',
                            input: 'email',
                            showLoaderOnConfirm: true,
                            confirmButtonText: 'Submit',
                            allowOutsideClick: false,
                            preConfirm: (input) => {
                                let data = $('#quote-form').serializeArray()
                                data = data.concat({
                                    name: "email",
                                    value: input
                                })

                                $.post("{{ url('api/v1/quote') }}/"+$('#quoteId').val(), data)
                                    .then((res) => {
                                        swal(
                                            'Sukses menyimpan hasil kalkulator!',
                                            'Hasil kalkulator telah disimpan di dalam akun anda!',
                                            'success'
                                        ).then((res) => {
                                            let dt = {
                                                email: input
                                            }

                                            $.post("{{ route('alternate-login') }}", dt)
                                                .then((res) => {
                                                    location.reload()
                                                })
                                        })
                                    })
                            }
                        })
                    }
                })
            })

            $('#requestQuote').click(function(e) {
                e.preventDefault()
                let data = $('#quote-form').serializeArray()

                if (!$('#userId').val()) {
                    swal({
                        title: 'Silahkan masuk atau mendaftar akun',
                        text: 'Untuk dapat menggunakan fitur ini, anda harus memiliki akun.',
                        type: 'warning',
                        allowOutsideClick: false,
                        showCancelButton: true,
                        confirmButtonText: 'Masuk',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonText: 'Daftar',
                        cancelButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            swal({
                                title: 'Login Partisipan',
                                html: '<input id="loginEmail" class="swal2-input" type="email" placeholder="Masukkan alamat email">' +
                                    '<input id="loginPassword" class="swal2-input" type="password" placeholder="Masukkan kata sandi">',
                                focusConfirm: false,
                                preConfirm: () => {
                                    let email = $('#loginEmail').val()
                                    let pass = $('#loginPassword').val()

                                    if (email && pass) {
                                        let data = [{
                                            name: "email",
                                            value: email
                                        }, {
                                            name: "password",
                                            value: pass
                                        }]

                                        $.post("{{ route('api.check-user') }}", data)
                                            .then((res) => {
                                                let updateData = [{
                                                    name: '_method',
                                                    value: 'PUT'
                                                }, {
                                                    name: 'email',
                                                    value: email
                                                }]

                                                $.post("{{ url('api/v1/quote') }}/"+$('#quoteId').val(), updateData)
                                                    .then((res) => {
                                                        swal(
                                                            'Sukses meminta penawaran!',
                                                            'Silahkan tunggu konfirmasi dari pihak kami',
                                                            'success'
                                                        ).then((res) => {
                                                            $.post("{{ route('alternate-login') }}", data)
                                                                .then((res) => {
                                                                    location.reload()
                                                                })
                                                        })
                                                    })
                                            }).fail(function(xhr, status, error) {
                                                swal({
                                                    title: 'Error!',
                                                    type: 'error',
                                                    text: 'Email atau password yang anda masukkan salah!'
                                                })
                                            })

                                    } else {
                                        swal.showValidationError('Silahkan masukkan alamat email dan password yang valid!')
                                    }
                                }
                            })
                        } else {
                            swal({
                                title: 'Daftar Partisipan',
                                text: 'Masukkan email anda',
                                input: 'email',
                                showLoaderOnConfirm: true,
                                confirmButtonText: 'Submit',
                                allowOutsideClick: false,
                                preConfirm: (input) => {
                                    data = data.concat({
                                        name: "email",
                                        value: input
                                    })

                                    $.post("{{ url('api/v1/quote') }}/"+$('#quoteId').val(), data)
                                        .then((res) => {
                                            swal(
                                                'Sukses meminta penawaran!',
                                                'Silahkan tunggu konfirmasi dari pihak kami',
                                                'success'
                                            ).then((res) => {
                                                let dt = {
                                                    email: input
                                                }

                                                $.post("{{ route('alternate-login') }}", dt)
                                                    .then((res) => {
                                                        location.reload()
                                                    })
                                            })
                                        })
                                }
                            })
                        }
                    })
                } else {
                    $.post("{{ url('api/v1/quote') }}/"+$('#quoteId').val(), data)
                        .then((res) => {
                            swal(
                                'Sukses meminta penawaran!',
                                'Silahkan tunggu konfirmasi dari pihak kami',
                                'success'
                            )
                        })
                }
            })
        })
    </script>
@stop
