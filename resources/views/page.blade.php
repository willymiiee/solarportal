@extends('layouts.main')

@section('meta')
    <meta property="og:title" content="{{ $data['item']->title }}" />
    <meta property="og:description" content="{!! $data['item']->content !!}" />
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
                                <img src="" id="headImg">
                            </figure>
                            <!--Properties Thumb Holder End-->
                        @endif

                        <!--TOp HOlder Start-->
                        <div class="top-holder2">
                            <div class="left">
                                <h2 id="title"></h2>
                            </div>
                        </div>
                        <!--TOp HOlder End-->

                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-calendar"></i> <span id="date"></span></li>
                        </ul>

                        <div id="content"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Section End-->
@endsection

@section('script')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script>
        $.get('{{ url('api/v1/articles/'.$data['slug']) }}', function(response) {
            $('#title').html(response.title);
            $('#content').html(response.content);
            $('#date').html(moment(response.created_at).format('DD MMM YYYY'));
            if (response.head_image) {
                $('#headImg').attr('src', '{{ url('') }}/' + (response.head_image ? response.head_image.url : ''));
            } else {
                $('#headImg').parent().remove();
            }
        });
    </script>
@endsection