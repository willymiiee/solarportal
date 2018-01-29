@extends('themes::mottestate.layouts.default')

@section('breadcrumb')
    <section class="tl-inner-banner">
        <div class="container">
            <h3>{{ $title }}</h3>
            {{--  <ul class="tl-breadcrumb-listed">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{{ $title }}</li>
            </ul>  --}}
        </div>
    </section>
@stop

@section('content')
    <section class="tl-blog-section pd-tb-80">
        <div class="container">
            <div class="row">
                @foreach ($items as $item)
                <div class="col-md-4 col-sm-4 col-xs-12" style="height: 500px">
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

                            {!! str_limit($item->content, 150) !!}

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
