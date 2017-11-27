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
    <!--Page Section Start-->
    <section class="tl-properties-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tl-properties-info">
                        @if ($data['item']->images()->first())
                            <!--Properties Thumb Holder Start-->
                            <figure class="tl-properties-thumb">
                                <img src="{{ url($data['item']->images()->first()->url) }}" id="headImg">
                            </figure>
                            <!--Properties Thumb Holder End-->
                        @endif

                        <!--TOp HOlder Start-->
                        <div class="top-holder2">
                            <div class="left">
                                <h2 id="title">{{ $data['item']->title }}</h2>
                            </div>
                        </div>
                        <!--TOp HOlder End-->

                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-calendar"></i> <span id="date">{{ \Carbon\Carbon::parse($data['item']->created_at)->format('d M Y') }}</span></li>
                            <li><i class="fa fa-calendar"></i> <span id="date">{{ moment($data['item']->created_at).format('DD MMM YYYY') }}</span></li>
                        </ul>

                        <div id="content">
                            {!! $data['item']->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Section End-->
@endsection

@section('script')
@endsection