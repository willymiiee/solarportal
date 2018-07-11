@extends('layouts.new')

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('addon')
    <div class="container-fluid homepage-search">
        <div class="row text-center">
            <div class="col">
                <div class="homepage-search-title noselect my-auto">
                    Gerakan Nasional Sejuta Surya Atap
                </div>
            </div>
        </div>

        {{--  <div class="row text-center mt-4" id="search-form">
            <div class="col">
                <div class="input-group">
                    <select class="selectpicker form-control" name="" id="searchSelect">
                        <option value="installer">Installers</option>
                        <option value="product">Products</option>
                    </select>
                    <input class="form-control" type="text" placeholder="Search by name" id="searchInput">
                    <span class="input-group-btn">
                        <button class="btn btn-submit" type="submit" id="searchBtn">Search</button>
                    </span>
                </div>
            </div>
        </div>  --}}
    </div>
@endsection

@section('content')
    {{--  <div class="container" id="coordinator">
        <div class="section-title" id="coordinator-title">Co-Coordinator</div>
        <hr class="section-line">

        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 coordinator-item">
                <img src="{{ asset('img/logo/aesi.png') }}" alt="">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 coordinator-item">
                <img src="{{ asset('img/logo/esdm.png') }}" alt="">
            </div>
        </div>
    </div>  --}}

    <div class="container text-center" id="buttons">
        <div class="row">
            <div class="col px-4">
                <a href="{{ route('calculator') }}" class="btn-more">Kalkulator Listrik Surya Atap</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-lg-4 mt-2">
                <a href="{{ route('company.category', ['slug' => 'epckontraktor-pemasang-listrik-surya-atap']) }}" class="btn-more">Daftar EPC</a>
            </div>

            <div class="col-12 col-lg-4 mt-2">
                <a href="{{ route('company.category', ['slug' => 'pabrikandistributorretailer-produk-listrik-surya-atap']) }}" class="btn-more">Daftar Pabrikan</a>
            </div>

            <div class="col-12 col-lg-4 mt-2">
                <a href="{{ route('company.index') }}" class="btn-more">Daftar Lengkap</a>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="about">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7 no-gutters" id="about-img">
                <div class="about-img"></div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 no-gutters" id="about-content">
                <div id="about-title">{{ $data['about']->title }}</div>

                <div id="about-description">
                    {!! $data['about']->content[0] !!}
                    <a href="{{ route('article.detail', ['slug' => $data['about']->slug]) }}" class="readmore">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="blog">
        <div class="section-title" id="blog-title">Informasi</div>
        <hr class="section-line">

        <div class="row">
            @foreach ($data['blog'] as $b)
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 blog-item">
                <img src="{{ $b->image ? asset($b->image->url) : 'http://via.placeholder.com/300x250' }}" alt="" class="blog-cover">
                <div class="blog-item-title">{{ str_limit($b->title, 25) }}</div>
                <div class="blog-item-content">
                    {!! str_limit($b->content, 150) !!}
                </div>
                <a href="{{ route('article.detail', ['slug' => $b->slug]) }}" class="blog-item-readmore">Lihat</a>
            </div>
            @endforeach
        </div>

        <div class="row align-items-center justify-content-center more-btn-container">
            <a href="{{ route('article.list') }}" class="btn-more">Daftar Artikel</a>
        </div>
    </div>

    <div class="container-fluid" id="benefit">
        <div id="benefit-title">Mengapa Listrik Surya Atap</div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 benefit-item">
                <i class="icon icon-chart"></i>
                <span>Hemat</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 benefit-item">
                <i class="icon icon-energy"></i>
                <span>Mandiri</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 benefit-item">
                <i class="icon icon-globe"></i>
                <span>Hijau</span>
            </div>
        </div>
    </div>

    <div class="container" id="signed">
        <div class="section-title" id="signed-title">Deklarator</div>
        <hr class="section-line">

        <div class="row align-items-center seven-cols">
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/esdm.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/kemenperin.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/bppt.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/aesi.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/meti.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/kadin.jpeg') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/iesr.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/apamsi.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/pplsa.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/maskeei.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/pjci.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/kkifn.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/akjeti.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-lg-1 col-xl-1 signed-item">
                <img src="{{ asset('img/logo/darmapersada.jpg') }}" alt="">
            </div>
        </div>
    </div>

    {{-- <div class="container" id="participant">
        <div class="section-title" id="participant-title">Partisipan</div>
        <hr class="section-line">

        <div class="row" id="participant-items">
            @foreach ($data['participant'] as $p)
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                {{ $p->name }}
            </div>
            @endforeach
        </div>

        <div class="row more-btn-container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center mt-2">
                <a href="{{ route('company.index') }}" class="btn btn-more">Daftar Lengkap Partisipan</a>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center mt-2">
                <a href="{{ route('register') }}" class="btn btn-more">Mendaftar menjadi Partisipan</a>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
@endsection
