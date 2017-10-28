@extends('layouts.main')

@section('menu')
@include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('addon')
<!--Search Content Start-->
<section class="tl-search-section">
    <div class="container">
        <!--Search Bar Content Start-->
        <div class="tl-search-bar-holder">
            <h2>Find the right product for you</h2>

            <!--Search Bar Inner Start-->
            <div class="tl-search-inner-row">
                <!--Search Form Start-->
                <form method="get" class="tl-search-form">

                    <!--Drop Down Start-->
                    <select class='tl-dropdown-outer tl-select-box'>
                        <option value='installer'>Installers</option>
                        <option value='product'>Products</option>
                        </select><!--Drop Down End-->

                    <input class="tl-search-address" type="text" placeholder="Search by name">

                    <button class="btn-search-submit" type="submit">Search</button>

                </form><!--Search Form End-->
            </div><!--Search Bar Inner End-->
        </div><!--Search Bar Content End-->
    </div>
</section>
<!--Search Content End-->
@endsection

@section('content')
<!--Blog Section Start-->
<section class="tl-blog-section pd-t-80">
    <div class="container">
        <!--Heading Outer Start-->
        <div class="tl-heading-outer">
            <h2>Blog</h2>
        </div>
        <!--Heading Outer End-->

        <div class="row">
            @foreach ($data['blog'] as $b)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!--Blog Box Start-->
                <div class="tl-blog-box">
                    <figure class="tl-thumb">
                        <a href="{{ url($b->slug) }}"><img src="{{ $b->image ? url($b->image->url) : '' }}"></a>
                    </figure>
                    <div class="tl-text-holder">
                        <h3><a href="{{ url($b->slug) }}">{{ $b->title }}</a></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $b->created_at }}</li>
                        </ul>
                    </div>
                </div>
                <!--Blog Box End-->
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Blog Section End-->
@endsection
