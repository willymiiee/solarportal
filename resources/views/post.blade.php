@extends('layouts.new')

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
    <div class="container pt-2">
        <div class="row">
            <div class="col-12 mt-2">
                <small>
                    <i class="far fa-calendar mr-1"></i> <span id="date">{{ \Carbon\Carbon::parse($data['item']->created_at)->format('l j F Y, h:i:s') }}</span>
                </small>

                <h2 class="mt-1 mb-2 font-weight-bold">{{ $data['item']->title }}</h2>

                <div class="share mb-1">
                    <a id="share-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ url($data['item']->slug) }}" target="_blank">
                        <i class="fab fa-facebook-square fa-3x"></i>
                    </a>
                    <a id="share-tw" href="https://twitter.com/intent/tweet?text={{ $data['item']->title }}&url={{ url($data['item']->slug) }}" target="_blank">
                        <i class="fab fa-twitter-square fa-3x"></i>
                    </a>
                    <a id="share-gp" href="https://plus.google.com/share?url={{ url($data['item']->slug) }}" target="_blank">
                        <i class="fab fa-google-plus-square fa-3x"></i>
                    </a>
                </div>

                @if ($data['item']->images()->first())
                    <img src="{{ url($data['item']->images()->first()->url) }}" class="img-fluid mb-2">
                @endif

                {!! $data['item']->content !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection