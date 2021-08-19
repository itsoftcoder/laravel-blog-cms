@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend') }}/assets/img/bg/page6.jpg); background-position: right">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2>Contact</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a>Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
              @include('frontend.sidebar')
                <div class="col-lg-9 col-md-9">
                    <div class="contact-message">
                        <div class="contact-title">
                            <h4>Contact Information</h4>
                        </div>
                        <form id="contact-form" class="contact-form" action="assets/mail.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Name*</label>
                                        <input name="name" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Email*</label>
                                        <input name="email" required="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Telephone</label>
                                        <input name="telephone" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>subject</label>
                                        <input name="subject" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea-style mb-30">
                                        <label>Comment*</label>
                                        <textarea class="form-control2" name="message" required=""></textarea>
                                    </div>
                                    <button class="submit contact-btn btn-hover" type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
