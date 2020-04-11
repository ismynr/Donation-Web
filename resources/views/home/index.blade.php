@extends('layouts.home.app')

@section('content')
    <section class="probootstrap-hero" style="background-image: url({{ asset('charity') }}/img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Donate <span>Together we can make a difference</span></h1>
                <p class="probootstrap-animate"><a href="#" class="btn btn-primary btn-lg">Donate Now</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="probootstrap-service-intro">
          <div class="container">
            <div class="probootstrap-service-intro-flex">
              <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                <div class="icon">
                  <i class="icon-wallet"></i>
                </div>
                <div class="text">
                  <h2>Give Donation</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <p><a href="#">Lear More</a></p>
                </div>
              </div>
              <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                <div class="icon">
                  <i class="icon-heart"></i>
                </div>
                <div class="text">
                  <h2>Become Volunteer</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <p><a href="#">Lear More</a></p>
                </div>
              </div>
              <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                <div class="icon">
                  <i class="icon-graduation-cap"></i>
                </div>
                <div class="text">
                  <h2>Give Scholarship</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                  <p><a href="#">Lear More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Most Popular Causes</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                <figure>
                  <img src="{{ asset('charity') }}/img/img_sm_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="99"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">$49,112</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">$50,000</span></div>
                  </div>
                  
                  <h2><a href="#">Help Children To Get Food</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 2 hours remaining</div>  
                  
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate quaerat maxime inventore.</p>
                  <p><a href="#" class="btn btn-primary btn-black">Donate Now!</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block  probootstrap-cause">
                <figure>
                  <img src="{{ asset('charity') }}/img/img_sm_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="95"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">$28,127</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">$30,000</span></div>
                  </div>
                  
                  <h2><a href="#">Help Children To Get Health</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 7 days remaining</div>  
                  
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate quaerat maxime inventore.</p>
                  <p><a href="#" class="btn btn-primary btn-black">Donate Now!</a></p>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block  probootstrap-cause">
                <figure>
                  <img src="{{ asset('charity') }}/img/img_sm_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="19"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">$21,973</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">$100,000</span></div>
                  </div>
                  
                  <h2><a href="#">Help Children To Get Education</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 15 days remaining</div>  
                  
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate quaerat maxime inventore.</p>
                  <p><a href="#" class="btn btn-primary btn-black">Donate Now!</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>Save the future for the little children by donating. <a href="causes.html">See all causes</a></p>
            </div>
          </div>
        </div>
      </section>

      
      <section class="probootstrap-section probootstrap-bg probootstrap-section-dark" style="background-image: url({{ asset('charity') }}/img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Latest Donations</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{ asset('charity') }}/img/person_6.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Linda Reyez</h3>
                  <p class="donated">Donated <span class="money">$500.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{ asset('charity') }}/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Chris Worth</h3>
                  <p class="donated">Donated <span class="money">$1,500.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{ asset('charity') }}/img/person_5.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Janet Morris</h3>
                  <p class="donated">Donated <span class="money">$250.00</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">

              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{ asset('charity') }}/img/person_7.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>Jessa Sy</h3>
                  <p class="donated">Donated <span class="money">$400.00</span></p>
                </div>
              </div>  

            </div>
          </div>
        </div>
      </section>
      
      <section class="probootstrap-section  probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2>What People Says</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                <div class="item">

                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{ asset('charity') }}/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com">
                    </figure>
                    <blockquote class="quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author"> &mdash; <span>Mike Fisher</span></cite></blockquote>
                  </div>

                </div>
                <div class="item">
                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{ asset('charity') }}/img/person_2.jpg" alt="Free Bootstrap Template by uicookies.com">
                    </figure>
                    <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author"> &mdash;<span>Jorge Smith</span></cite></blockquote>
                  </div>
                </div>
                <div class="item">
                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{ asset('charity') }}/img/person_3.jpg" alt="Free Bootstrap Template by uicookies.com">
                    </figure>
                    <blockquote class="quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; <span>Brandon White</span></cite></blockquote>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
        
      <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="{{ asset('charity') }}/img/img_sq_5_big.jpg" alt="Free Bootstrap Template by uicookies.com">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>Sucess Stories</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
            <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
          </div>
        </div>
      </section>
@endsection