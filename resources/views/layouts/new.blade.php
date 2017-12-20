<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Solar Directory</title>

    {{--  Bootstrap 4  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">

    {{--  CSS  --}}
    <link rel="stylesheet" href="{{ asset('css/new-style.css') }}">

    {{--  Simple Line Icons  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
</head>
<body>
    @include('includes.frontend.menu')

    <div class="container-fluid homepage-search">
        <div class="row text-center">
            <div class="col">
                <div class="homepage-search-title noselect my-auto">
                    One Million Solar Rooftop Movement
                </div>
            </div>
        </div>

        <div class="row text-center mt-4" id="search-form">
            <div class="col">
                <div class="input-group">
                    <select class="selectpicker form-control" name="" id="searchSelect">
                        <option value="installer">Installers</option>
                        <option value="product">Products</option>
                    </select>
                    <input class="form-control" type="text" placeholder="Search by name" id="searchInput">
                    <span class="input-group-btn">
                        <button class="btn btn-submit" type="submit" id="searchBtn">Search</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="coordinator">
        <div class="section-title" id="coordinator-title">Co-Coordinator</div>
        <hr class="section-line">

        <div class="row">
            <div class="coordinator-item"></div>
            <div class="coordinator-item"></div>
        </div>
    </div>

    <div class="container-fluid" id="about">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7 no-gutters about-img">
                <div class="about-img"></div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 no-gutters about-content">
                <div class="about-title">About our movement</div>

                <div class="about-description">
                    <p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble. While NASA has had many ups and downs, the launch and continued operation of the Hubble space telescope probably ranks next to the moon landings and the development of the Space Shuttle as one of the greatest space exploration accomplishments of the last hundred years.</p>

                    <p>An amazing piece of astronomy trivia that few people know is that in truth, only about ten percent of the universe is visible using conventional methods of observation. For that reason, the Hubble really was a huge leap forward. That is for the very simple reason that the Hubble can operate outside of the atmosphere of Earth. Trying to make significant space exploration via telescopes from the terrestrial surface of planet Earth is very difficult. That very thing that keeps us alive, our own Earth’s atmosphere presents a serious distraction from being able to see deeper and further into space.</p>

                    {{--  <p>The Hubble space telescope was named after the great scientist and visionary Edward Hubble who discovered that the universe was expanding which was explained by what is now known in science as Hubble’s Law. To truly get a feel for the amazing accomplishment that was achieved with the launch of the Hubble telescope, spend some time on Nasa’s web site dedicated to the project at http://hubble.nasa.gov. There are also a number of sites where you can enjoy some stunning pictures from the Hubble including http://heritage.stsci.edu/ and http://www.stsci.edu/ftp/science/hdf/hdf.html. It’s hard to believe how long the Hubble has been orbiting earth and sending back amazing video and pictures of what it is discovering in space. But the Hubble was actually initially launched on April 25th 1990. It was the culmination of literally decades of research and construction which began in 1977. Expectations were high as the orbiting telescope was put in place and actually began to function as it was designed to do.</p>

                    <p>All was not always perfect with the telescope and the early pictures were disappointing. After some study NASA discovered that the reason for the early failures was the curvatures of one of the main lenses of the orbiting telescope.</p>

                    <p>We probably could never have kept this intricate piece of equipment operational as well as we have had we not had the Space Shuttle program to give us a tool to implement repairs and improvements to the Hubble. In 1993 a new lens was installed on the Hubble which corrected the problem of picture resolution that was noted in the early operation of the telescope.</p>

                    <p>Two other repair and upgrade mission have been made to the Hubble since it launched, both of them in 1997 to upgrade older equipment and to retrofit the telescope to extend its useful life through 2010. It’s pretty amazing to think that this scientific and mechanical marvel has been operating now for ten years without maintenance. We can be assured that plans are in the works for NASA to upgrade or replace parts on the Hubble to extend its useful life even further as that 2010 time frame draws closer.</p>

                    <p>It is hard to imagine the science of astronomy or the natural quest for greater knowledge of our universe without the Hubble. While many times those who would not fund space exploration have tried to cut funding for the Hubble, the operation of this telescope is just too important to astronomers and to the scientific well being of mankind and our planet not to continue to use the Hubble, or its next natural successor. We will always need to have a set of eyes in the sky to watch the universe and discover more of its mysteries.</p>  --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="blog">
        <div class="section-title" id="blog-title">Blog Posts</div>
        <hr class="section-line">

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 blog-item">
                <img src="{{ asset('img/search.jpg') }}" alt="" class="blog-cover">
                <div class="blog-item-title">Blog Post 1</div>
                <div class="blog-item-content">
                    <p>About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about.   11% of all adult internet users visit dating websites and spend their time in chatrooms. Some of the classify their behavior </p>
                </div>
                <a href="#" class="blog-item-readmore">Read more</a>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 blog-item">
                <img src="{{ asset('img/search.jpg') }}" alt="" class="blog-cover">
                <div class="blog-item-title">Blog Post 2</div>
                <div class="blog-item-content">
                    <p>About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about.   11% of all adult internet users visit dating websites and spend their time in chatrooms. Some of the classify their behavior </p>
                </div>
                <a href="#" class="blog-item-readmore">Read more</a>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 blog-item">
                <img src="{{ asset('img/search.jpg') }}" alt="" class="blog-cover">
                <div class="blog-item-title">Blog Post 3</div>
                <div class="blog-item-content">
                    <p>About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about.   11% of all adult internet users visit dating websites and spend their time in chatrooms. Some of the classify their behavior </p>
                </div>
                <a href="#" class="blog-item-readmore">Read more</a>
            </div>
        </div>

        <div class="row align-items-center justify-content-center" id="blog-readmore">
            <a href="#" id="blog-btn-readmore">Find out more</a>
        </div>
    </div>

    <div class="container-fluid" id="benefit">
        <div id="benefit-title">Benefit using solar rooftop</div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-chart"></i>
                <span>Save more money</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-energy"></i>
                <span>Better performance</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-bulb"></i>
                <span>Save the planet</span>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 benefit-item">
                <i class="icon icon-diamond"></i>
                <span>Secure investment</span>
            </div>
        </div>
    </div>

    <div class="container" id="participant">
        <div class="section-title" id="participant-title">Participants</div>
        <hr class="section-line">

        <div class="row" id="participant-items">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company A
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company B
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company C
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 participant-item">
                Company D
            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Contact</div>

                <div class="footer-col-content">
                    <i class="icon icon-location-pin"></i>
                    <span>57 Leonard Igorevich St, New York NY 10013, USA</span><br>
                    <i class="icon icon-phone"></i>
                    <span>+1 212-431-2100</span><br>
                    <i class="icon icon-envelope"></i>
                    <span>info@sejutasuryaatap.com</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Recent posts</div>

                <div class="footer-col-content">
                    <ul>
                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 4</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 3</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 2</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 1</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">About</div>

                <div class="footer-col-content">
                    <a href="#">Co-coordinator</a>
                    <a href="#">Participants</a>
                    <a href="#">Solar roof benefits</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Search</div>

                <div class="footer-col-content">
                    <input type="text" id="footerSearch" placeholder="Search...">
                    <a href="#" id="footerSearchBtn"><i class="icon icon-magnifier"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4.min.js') }}"></script>

    {{--  Font Awesome  --}}
    <script src="https://use.fontawesome.com/6de5c4290d.js"></script>
</body>
</html>