@extends('layouts.new')

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('addon')
    <div class="container-fluid homepage-search">
        <div class="row text-center">
            <div class="col">
                <div class="homepage-search-title noselect my-auto">
                    One Million Solar Rooftop Movement
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
    <div class="container" id="coordinator">
        <div class="section-title" id="coordinator-title">Co-Coordinator</div>
        <hr class="section-line">

        <div class="row">
            <div class="coordinator-item"></div>
            <div class="coordinator-item"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7 no-gutters" id="about-img">
                <div class="about-img"></div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 no-gutters" id="about-content">
                <div id="about-title">{{ $data['about']->title }}</div>

                <div id="about-description">
                    {!! $data['about']->content !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="blog">
        <div class="section-title" id="blog-title">Informasi Terkini</div>
        <hr class="section-line">

        <div class="row">
            @foreach ($data['blog'] as $b)
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 blog-item">
                <img src="{{ $b->image ? url($b->image->url) : '' }}" alt="" class="blog-cover">
                <div class="blog-item-title">{{ $b->title }}</div>
                <div class="blog-item-content">
                    {!! substr($b->content, 0, 120).'...' !!}
                </div>
                <a href="{{ url($b->slug) }}" class="blog-item-readmore">Read more</a>
            </div>
            @endforeach
        </div>

        <div class="row align-items-center justify-content-center" id="blog-readmore">
            <a href="#" id="blog-btn-readmore">Find out more</a>
        </div>
    </div>

    <div class="container-fluid" id="benefit">
        <div id="benefit-title">Mengapa Listrik Surya Atap</div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-chart"></i>
                <span>Hemat</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-energy"></i>
                <span>Mandiri</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-bulb"></i>
                <span>Hijau</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-diamond"></i>
                <span>Investasi</span>
            </div>
        </div>
    </div>

    <div class="container" id="participant">
        <div class="section-title" id="participant-title">Participants</div>
        <hr class="section-line">

        <div class="row" id="participant-items">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company A
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company B
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company C
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company D
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
