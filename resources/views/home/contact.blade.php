@extends('layouts.home.app')

@section('content')
    <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url({{ asset('charity') }}/img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Contact Us <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
          <div class="col-md-5 probootstrap-animate">
            <form action="#" method="post" class="probootstrap-form">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea cols="30" rows="10" class="form-control" id="message" name="message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Send Message">
              </div>
            </form>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            
            
            <h4>USA Office</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-pin"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
              <li><i class="icon-email"></i><span>info@domain.com</span></li>
              <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
            </ul>

            <h4>Europe Office</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-pin"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
              <li><i class="icon-email"></i><span>info@domain.com</span></li>
              <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
            </ul>

            <h4>Asia Office</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-pin"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
              <li><i class="icon-email"></i><span>info@domain.com</span></li>
              <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
            </ul>
            
          </div>
        </div>
        </div>
      </section>
@endsection