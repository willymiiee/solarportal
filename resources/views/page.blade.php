@extends('layouts.main')

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
                    <!--Properties Thumb Holder Start-->
                    <figure class="tl-properties-thumb">
                        <img src="" id="headImg">
                    </figure>
                    <!--Properties Thumb Holder End-->

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
    $.get('{{ url('api/v1/pages/'.$data['slug']) }}', function(response) {
        $('#title').html(response.title);
        $('#content').html(response.content);
        $('#date').html(moment(response.created_at).format('DD MMM YYYY'));
        $('#headImg').attr('src', '{{ url('') }}/' + response.image.url);
    });
</script>
@endsection