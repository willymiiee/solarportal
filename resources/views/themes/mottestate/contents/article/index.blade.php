@extends('themes::mottestate.layouts.default')

@section('styles')
    <style>
        .tl-breadcrumb-listed input {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .tl-breadcrumb-listed button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .tl-breadcrumb-listed button:hover {
            background: #ccc;
        }
    </style>
@stop

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
            <h3>{{ $title }}</h3>
            <form action="{{ route('article list') }}" class="tl-breadcrumb-listed">
                <input type="text" name="search" placeholder="Search article">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </section>
@stop

@section('content')
    <section class="tl-blog-section pd-tb-80">
        <div class="container">
            <div class="row">
                @foreach ($items as $item)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="tl-blog-box">
                        <figure class="tl-thumb">
                            <a href="{{ route('article detail', ['slug' => $item->slug]) }}">
                                <img src="{{ $item->image ? asset($item->image->url) : 'http://via.placeholder.com/300x250' }}" alt="" />
                            </a>
                        </figure>

                        <div class="tl-text-holder">
                            <h3>
                                <a href="{{ route('article detail', ['slug' => $item->slug]) }}">
                                    {{ str_limit($item->title, 25) }}
                                </a>
                            </h3>

                            <ul class="tl-meta-listed tl-meta-listed_v2">
                                <li><i class="fa fa-clock-o"></i></li>
                            </ul>

                            {!! str_limit(strip_tags($item->content), 150) !!}

                            <br>
                            <br>
                            <a href="{{ route('article detail', ['slug' => $item->slug]) }}" class="tl-readmore">Lihat</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $items->links() }}
        </div>
    </section>
@stop
