@extends('layouts.home.app')

@section('content')
<!-- banner part start-->
<section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <h1>Help The <br>
                                Children in Need </h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut</p>
                            <a href="#" class="btn_2">Start Donation</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-7">
                    <div class="banner_video">
                        <div class="banner_video_iner">
                            <img src="{{ asset('amor') }}/img/banner_video.png" alt="">
                            <div class="extends_video">
                                <a id="play-video_1" class="video-play-button popup-youtube"
                                    href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                    <span class="fas fa-play"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- service part start-->
    <section class="service_part pt-0">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-sm-10">
                    <div class="service_text">
                        <h2>We are CharityPress
                            Funding Network
                            Worldwide.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            Lorem ipsum dolor sit amet consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        <a href="service.html" class="btn_3">learn more</a>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="service_part_iner">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_service_text ">
                                    <i class="flaticon-money"></i>
                                    <h4>Donation</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                                    <a href="#">donate now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_service_text">
                                    <i class="flaticon-money"></i>
                                    <h4>Adopt A Child</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                                    <a href="#">contact us</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_service_text">
                                    <i class="flaticon-money"></i>
                                    <h4>Become A Volunteer</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_service_text">
                                    <i class="flaticon-money"></i>
                                    <h4>Donation</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                                    <a href="#">donate now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service part end-->

    <!-- about part end-->
    {{-- <section class="about_us">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="about_us_img">
                        <img src="{{ asset('amor') }}/img/top_service.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_us_text">
                        <h5>
                            2000<br><span>since</span>
                        </h5>
                        <h2>About Believe</h2>
                        <p>According to the research firm Frost & Sullivan, the estimated
                            size of the North American used test and measurement equipment
                            market was $446.4 million in 2004 and is estimated to grow to
                            $654.5 million by 2011. For over 50 years, companies and governments
                            have procured used test and measurement instruments.</p>
                        <div class="banner_item">
                            <div class="single_item">
                                <h2> <span class="count">50</span>k</h2>
                                <h5>Total
                                    Volunteer</h5>
                            </div>
                            <div class="single_item">
                                <h2><span class="count">25</span>k</h2>
                                <h5>Successed
                                    Mission</h5>
                            </div>
                            <div class="single_item">
                                <h2><span class="count">100</span>k</h2>
                                <h5>Total
                                    Collection</h5>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="col-lg-12">
                    <div class="text-center about_btn">
                            <a class="btn_3 " href="#">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- about part end-->

    <!--::passion part start::-->
    <section class="passion_part passion_section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-8">
                    <div class="section_tittle">
                        <h2>Our Causes</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna </p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-passion">
                        <div class="card">
                            <img src="{{ asset('amor') }}/img/passion/passion_1.png" class="card-img-top" alt="blog">
                            <div class="card-body">

                                <a href="#">
                                    <h5 class="card-title">Fourth created forth fill
                                        created subdue be </h5>
                                </a>
                                <ul>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_1.svg" alt=""> Goal: $2500</li>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_2.svg" alt=""> Raised: $1533</li>
                                </ul>
                                <div class="skill">
                                        <div class="skill-bar skill11 wow slideInLeft animated">
                                            <span class="skill-count11">75%</span>
                                        </div>
                                    </div>
                                <a href="#" class="btn_2">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-passion">
                        <div class="card">
                            <img src="{{ asset('amor') }}/img/passion/passion_2.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">Fourth created forth fill
                                        created subdue be </h5>
                                </a>
                                <ul>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_1.svg" alt=""> Goal: $2500</li>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_2.svg" alt=""> Raised: $1533</li>
                                </ul>
                                <div class="skill">
                                        <div class="skill-bar skill11 wow slideInLeft animated">
                                            <span class="skill-count11">75%</span>
                                        </div>
                                    </div>
                                <a href="#" class="btn_2">read more</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-passion">
                        <div class="card">
                            <img src="{{ asset('amor') }}/img/passion/passion_3.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">Fourth created forth fill
                                        created subdue be </h5>
                                </a>
                                <ul>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_1.svg" alt=""> Goal: $2500</li>
                                    <li><img src="{{ asset('amor') }}/img/icon/passion_2.svg" alt=""> Raised: $1533</li>
                                </ul>
                                <div class="skill">
                                        <div class="skill-bar skill11 wow slideInLeft animated">
                                            <span class="skill-count11">75%</span>
                                        </div>
                                    </div>
                                <a href="#" class="btn_2">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::passion part end::-->

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="intro_video_iner text-center">
                        <h2>Please raise your hand & Save world </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        <a href="#" class="btn_2">Become a Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->
@endsection