@extends('layouts.main')

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
                        <h3 id="title"></h3>
                        <ul class="tl-meta-listed tl-meta-listed_v2">
                            <li><i class="fa fa-calendar"></i> <span id="date"></span></li>
                        </ul>
                    </div>
                    <!--Top Holder End-->

                    <!--Thumb Holder start-->
                    <figure class="tl-thumb">
                        <img src="" id="headImg">
                    </figure>

                    <!--Text HOlder Start-->
                    <div class="tl-text-holder">
                        <div id="content"></div>

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
                                                <a href="https://demo-themelocation.co/mottestate/blog-detail.html"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="tl-tw-icon">
                                                <a href="https://demo-themelocation.co/mottestate/blog-detail.html"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="tl-gp-icon">
                                                <a href="https://demo-themelocation.co/mottestate/blog-detail.html"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
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
<script src="{{ asset('js/moment.min.js') }}"></script>
<script>
    $.get('{{ url('api/v1/posts/'.$data['slug']) }}', function(response) {
        $('#title').html(response.title);
        $('#content').html(response.content);
        $('#date').html(moment(response.created_at).format('DD MMM YYYY'));
        $('#headImg').attr('src', '{{ url('') }}/' + (response.image ? response.image.url : ''));
    });
</script>
@endsection