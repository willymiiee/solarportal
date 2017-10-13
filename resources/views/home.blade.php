@extends('layouts.main')

@section('search')
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
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!--Blog Box Start-->
                <div class="tl-blog-box">
                    <figure class="tl-thumb">
                        <a href="blog-detail.html"><img src="images/blog-sm-img-01.jpg" alt=""></a>
                    </figure>
                    <div class="tl-text-holder">
                        <h3><a href="blog-detail.html">New loft apartments</a></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>26 February, 2017</li>
                        </ul>
                    </div>
                </div>
                <!--Blog Box Start-->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!--Blog Box Start-->
                <div class="tl-blog-box">
                    <figure class="tl-thumb">
                        <a href="blog-detail.html"><img src="images/blog-sm-img-02.jpg" alt=""></a>
                    </figure>
                    <div class="tl-text-holder">
                        <h3><a href="blog-detail.html">Exclusive listings</a></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>06 March, 2017</li>
                        </ul>
                    </div>
                </div>
                <!--Blog Box Start-->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!--Blog Box Start-->
                <div class="tl-blog-box">
                    <figure class="tl-thumb">
                        <a href="blog-detail.html"><img src="images/blog-sm-img-03.jpg" alt=""></a>
                    </figure>
                    <div class="tl-text-holder">
                        <h3><a href="blog-detail.html">How much it cost?</a></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>24 March, 2017</li>
                        </ul>
                    </div>
                </div>
                <!--Blog Box Start-->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <!--Blog Box Start-->
                <div class="tl-blog-box">
                    <figure class="tl-thumb">
                        <a href="blog-detail.html"><img src="images/blog-sm-img-04.jpg" alt=""></a>
                    </figure>
                    <div class="tl-text-holder">
                        <h3><a href="blog-detail.html">Original mortgage rates</a></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>15 March, 2017</li>
                        </ul>
                    </div>
                </div>
                <!--Blog Box Start-->
            </div>
        </div>
    </div>
</section>
<!--Blog Section End-->
@endsection
