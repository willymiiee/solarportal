@extends('layouts.main')

@section('meta')
    <meta property="og:title" content="{{ $data['item']->title }}" />
    <meta property="og:description" content="{!! substr($data['item']->content, 0, 100) !!}" />
    @if ($data['item']->images()->first())
        <meta property="og:image" content="{{ asset($data['item']->images()->first()->url) }}" />
    @endif
@endsection

@section('menu')
    @include('includes.frontend.menu', ['menus' => $data['menu']])
@endsection

@section('content')
    <!--Properties Section Start-->
    <section class="tl-blog-section pd-tb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <!--Blog Item Start-->
                    <div class="tl-blog-box tl-blog-detail-info">
                        <!--Top Holder Srart-->
                        <div class="tl-top-holder">
                            <h3 id="title">{{ $data['item']->title }}</h3>
                            <ul class="tl-meta-listed tl-meta-listed_v2">
                                <li><i class="fa fa-calendar"></i> <span id="date">{{ \Carbon\Carbon::parse($data['item']->created_at)->format('d M Y') }}</span></li>
                            </ul>
                        </div>
                        <!--Top Holder End-->

                        @if ($data['item']->images()->first())
                            <!--Thumb Holder start-->
                            <figure class="tl-thumb">
                                <img src="{{ url($data['item']->images()->first()->url) }}" id="headImg">
                            </figure>
                        @endif

                        <!--Text HOlder Start-->
                        <div class="tl-text-holder">
                            <div id="content">
                                {!! $data['item']->content !!}
                            </div>

                            <!--Blog Bottom HOlder Start-->
                            <div class="tl-bottom-holder">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!--Share Holder Start-->
                                        <div class="tl-share-holder">
                                            <span>Share</span>

                                            <!--Social Links Start-->
                                            <ul class="top-social-links tl-social-links">
                                                <li class="tl-fb-icon">
                                                    <a id="fb-share" href="https://www.facebook.com/sharer/sharer.php?u='{{ url($data['item']->slug) }}'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="tl-tw-icon">
                                                    <a id="tw-share" href="https://twitter.com/intent/tweet?text='{{ $data['item']->title }}'&url='{{ url($data['item']->slug) }}'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="tl-gp-icon">
                                                    <a id="gp-share" href="https://plus.google.com/share?url={{ url($data['item']->slug) }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                            <!--Social Links End-->
                                        </div>
                                        <!--Share Holder End-->
                                    </div>
                                </div>
                            </div>
                            <!--Blog Bottom HOlder End-->
                        </div>
                        <!--Text HOlder End-->
                    </div>
                    <!--Blog Item End-->
                </div>
            </div>
        </div>
    </section>
    <!--Properties Section End-->
@endsection

@section('script')
@endsection