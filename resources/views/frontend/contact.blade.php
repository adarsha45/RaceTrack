@extends('frontend.layout')

@section('content')

@if(Session::has('success'))
   <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
@endif


    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                    <div class="block-heading-1">
                        <span>Get In Touch</span>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                    @isset($message_sucess)

                        <div class="container">
                            <div class="alert alert-success" role="alert">
                                {!! $message_sucess !!}
                            </div>
                        </div>
                    @endisset
                    @isset($message_warning)

                        <div class="container">
                            <div class="alert alert-warning" role="alert">
                                {!! $message_warning !!}
                            </div>
                        </div>
                    @endisset


                    <form action="{{url('/contact')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text" name="first_name" class="form-control {{$errors->has('first_name') ? 'border-danger':''}}" placeholder="First name" value="{{old('first_name')}}">
                                <small class="form-text text-danger">{!! $errors->first('first_name') !!}</small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control {{$errors->has('last_name') ? 'border-danger':''}}" placeholder="Last name" value="{{old('last_name')}}">
                                <small class="form-text text-danger">{!! $errors->first('last_name') !!}</small>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control {{$errors->has('email') ? 'border-danger':''}}" placeholder="Email address" value="{{old('email')}}">
                                <small class="form-text text-danger">{!! $errors->first('email') !!}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="message" id="" class="form-control {{$errors->has('message') ? 'border-danger':''}}" placeholder="Write your message." cols="30" rows="10">{{old('message')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('message') !!}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ml-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black">Need to know more on details. Get In Touch</h2>
                    <p>This websites the client to more easily and efficiently record and analyse the data that is
                        manually collected from his race car</p>
                    <p><a href="#" class="btn btn-primary text-white">Get Started</a></p>
                </div>
            </div>
        </div>
    </div>



@endsection
