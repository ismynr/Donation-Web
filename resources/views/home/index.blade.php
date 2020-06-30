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
                                Persons in Need </h1>
                            <p>Someone you know somewhere might be in trouble financially. They don't have enough food, or even a roof over their head. What can you do to help?</p>
                            <a href="{{ url('/login') }}" class="btn_2">Start Donation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
@endsection