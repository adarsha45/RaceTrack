<!doctype html>
<html lang="en">

<head>
    <title>Race Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="text-white"><span class="mr-2 text-white icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info@racetracker.com</span></a>
                        <span class="mx-md-2 d-inline-block"></span>
                        <a href="#" class="text-white"><span class="mr-2 text-white icon-phone"></span> <span class="d-none d-md-inline-block">0455678456</span></a>


                        <div class="float-right">

                            <a href="#" class="text-white"><span class="mr-2 text-white icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                            <span class="mx-md-2 d-inline-block"></span>
                            <a href="#" class="text-white"><span class="mr-2 text-white icon-instagram"></span> <span class="d-none d-md-inline-block">Instagram</span></a>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">


                    <div class="site-logo">
                        <a href="" class="text-black"><span class="text-primary">Race Tracker</span></a>
                    </div>

                    <div class="col-12">
                        <nav class="site-navigation text-right ml-auto " role="navigation">

                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#about-section" class="nav-link">About Us</a></li>
                                <li><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
                                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>Login</a>
                                </li>
                                <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>Register</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                    <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>


        <div class="owl-carousel slide-one-item">

            <div class="site-section-cover overlay img-bg-section" style="background-image: url('{{asset('frontend/images/1.jpg')}}'); ">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-12 col-lg-7">
                            <h1 data-aos="fade-up" data-aos-delay="">Welcome to Race Track</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Auto racing, bull fighting, and mountain
                                climbing are the only real sports… all the others are games.</p>
                            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get
                                    in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section-cover overlay img-bg-section" style="background-image: url('{{asset('frontend/images/2.jpg')}}'); ">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-12 col-lg-8">
                            <h1 data-aos="fade-up" data-aos-delay="">Welcome to Race Track</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">There have been other tracks that
                                separated the men from the boys. This is the track that will separate the brave from the
                                weak after the boys are gone.</p>
                            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get
                                    in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section-cover overlay img-bg-section" style="background-image: url('{{asset('frontend/images/3.png')}}'); ">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-12 col-lg-8">
                            <h1 data-aos="fade-up" data-aos-delay="">Welcome to Race Track</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">To achieve anything in this game you
                                must be prepare to dabble in the boundary of disaster.</p>
                            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get
                                    in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section-cover overlay img-bg-section" style="background-image: url('{{asset('frontend/images/4.jpg')}}'); ">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-12 col-lg-8">
                            <h1 data-aos="fade-up" data-aos-delay="">Welcome to Race Track</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Faster, faster, faster, until the thrill
                                of speed overcomes the fear of death.</p>
                            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get
                                    in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="site-section">
            <div class="block__73694 mb-2" id="services-section">
                <div class="container">
                    <div class="row d-flex no-gutters align-items-stretch">

                        <div class="col-12 col-lg-6 block__73422" style="background-image: url('{{asset('frontend/images/driver.jpg')}}');" data-aos="fade-right" data-aos-delay="">
                        </div>


                        <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="">
                            <h2 class="mb-3 text-black">What can you do?</h2>
                            <p>Race track is the private company which utilizes the software within the racing industry.</p>

                            <p>This websites provdses data logging solution for the megasquirt series of engine management
                                controller.</p>

                            <ul class="ul-check primary list-unstyled mt-5">
                                <li>This software tracks the data</li>
                                <li>You can automatically record mechanical configuration of data.</li>
                                <li>You can directly store the data through your phones</li>
                                <li>Supports multiple users.</li>
                            </ul>


                        </div>

                    </div>
                </div>
            </div>


            <div class="site-section bg-dark" id="about-section">
                <div class="container">
                    <div class="row justify-content-center mb-4 block-img-video-1-wrap">

                            <figure class="block-img-video-1" data-aos="fade">
                                <a href="{{asset('frontend/images/My Movieeeee.mp4')}}" data-fancybox data-ratio="1" >
                                    <span class="icon"><span class="icon-play"></span></span>
                                    <img src="{{asset('frontend/images/cars.jpg')}}" alt="Image" class="img-fluid">
                                </a>
                            </figure>
                    </div>

                </div>
            </div>
        </div>

        <div class="site-section" id="team-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                            <h2>Our Team</h2>
                            <p>This website  allows the client to more easily and efficiently record and analyse the data that is manually collected from his race car. The end goal of this data analysis is to enable the driver of the car to easily determine which changes to the car were successful in improving lap times around a variety of race tracks.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Alex Hendry</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Project Manager</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Arshdeep Vring</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Software Developer</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Abhiraj Basnet</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Software Developer</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Sida Wang</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Software Developer</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Jordan Shipway</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Software Developer</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">Joshua Oldfield</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Software Engineer</span>
                            <div class="block-social-1">
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="site-section bg-light" id="pricing-section">
            <div class="container">
                <div class="row mb-5 justify-content-center text-center">
                    <div class="col-md-7">
                        <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                            <h2>Pricing</h2>
                            <p>Pick a plan that fits your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="pricing">
                            <h3 class="text-center text-black">Basic</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$47</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Customer can race three times a week</li>
                                <li class="remove">Locker not provided</li>
                                <li class="remove">Customer need to pay for the parking</li>
                                <li class="remove">Customer need to book</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-secondary btn-md">Buy Now</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing">
                            <h3 class="text-center text-black">Annual</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$200</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Parking is available</li>
                                <li>Can race 5 days in a week</li>
                                <li>Locker is provided</li>
                                <li>Doesn't need to book</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-primary btn-md text-white">Buy Now</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing">
                            <h3 class="text-center text-black">Premium</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$550</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Customer can race at anytime</li>
                                <li>Customer doesn't need to book</li>
                                <li>Locker is provided</li>
                                <li>Parking will be free</li>
                                <li>Premium member will have access with sport website</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-secondary btn-md">Buy Now</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row site-section" id="faq-section">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title text-primary">Frequently Ask Questions</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                            <p>Yes, we accept both Paypal and stripe.</p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                            <p>After the booking customer need to wait for 3 days of transaction to get their refund.</p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                            <p>Yes </p>
                        </div>


                    </div>
                    <div class="col-lg-6">

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Where is it located?</h3>
                            <p>It is located in the GoldCoast and other part of the australia.</p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What is your opening time?</h3>
                            <p>The opening time for the race track is from 10:00 am to 8:00 pm</p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Do you guys open in public holidays?</h3>
                            <p>Besides the christmas holiday we are open at any day</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

       @include('frontend.contact')


        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="footer-heading mb-4">About Us</h2>
                                <p> This websites the client to more easily and efficiently record and analyse the data that
                                    is manually collected from his race car.</p>
                            </div>
                            <div class="col-md-4 ml-auto">

                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>

                                    <li><a href="{{url('contact')}}" >Contact Us</a></li>
                                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>Login</a>
                                    </li>
                                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>Register</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 ml-auto">

                        <div class="mb-5">
                            <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
                            <form action="#" method="post" class="footer-suscribe-form">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary text-white" type="button" id="button-addon2">
                                            Subscribe
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>

                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p class="copyright"><small>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </small></p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    </div>


    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('frontend/js/aos.js')}}"></script>

    <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>
