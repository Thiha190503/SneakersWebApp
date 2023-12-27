@extends('user.layouts.master')

@section('title', 'Home Page')

@section('content')
    <div id="app">
        <!--start home area-->
        <section id="home-area" data-scroll-index="0">
            <div class="container">
                <div class="row">
                    <!--start caption content-->
                    <div class="col-md-6">
                        <div class="caption d-table">
                            <div class="d-table-cell align-middle">
                                <h1>Every step defines your style!</h1>
                                <p> A high-resolution, dynamic visual displaying a featured sneaker or a collage of popular
                                    styles. Be a trend setter with our latest sneakers.</p>
                                <a href="{{ route('user#home') }}">Buy Products</a>
                            </div>
                        </div>
                    </div>
                    <!--end caption content-->
                    <!--start caption image-->
                    <div class="col-md-6">
                        <div class="caption-img text-right">
                            <img src="{{ asset('user/img/home-image.webp') }}" class="img-fluid animation-jump" alt>
                        </div>
                    </div>
                    <!--end caption image-->
                </div>
            </div>
            <div class="pattern-bg"></div>
        </section>
        <!--end home area-->

        <!--start feature area-->
        <section id="feature-area" class="bg-gray" data-scroll-index="1">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-lg-1 col-md-8 offset-md-2">
                        <div class="section-heading text-center">
                            <h2>Exploring The Trustworthy Advantages of Our Sneaker Hub</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--start feature single-->
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single text-center">
                            <div class="icon">
                                <i class="icofont-boot-alt-2"></i>
                            </div>
                            <h4>Sneaker Quality</h4>
                            <p>Our sneakers are authentic and well-packaged.</p>
                        </div>
                    </div>
                    <!--end feature single-->
                    <!--start feature single-->
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single text-center">
                            <div class="icon">
                                <i class="icofont-dollar"></i>
                            </div>
                            <h4>Trusted Prices</h4>
                            <p>Clear and fair prices – no hidden fees or surprises.</p>
                        </div>
                    </div>
                    <!--end feature single-->
                    <!--start feature single-->
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single text-center">
                            <div class="icon">
                                <i class="icon-avatar"></i>
                            </div>
                            <h4>Customer Services</h4>
                            <p>Your satisfaction matters. Our support team is here for a smooth shopping experience.</p>
                        </div>
                    </div>
                    <!--end feature single-->
                    <!--start feature single-->
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single text-center">
                            <div class="icon">
                                <i class="icofont-delivery-time"></i>
                            </div>
                            <h4>Delivery service</h4>
                            <p>Get your sneakers quickly and reliably.</p>
                        </div>
                    </div>
                    <!--end feature single-->
                </div>
            </div>
        </section>
        <!--end feature area-->
        <!--start about area-->
        <section id="about-area" class="bg-white" data-scroll-index="2">
            <div class="container">
                <div class="row">
                    <!--start about image-->
                    <div class="col-md-6">
                        <div class="about-img text-center">
                            <img src="{{ asset('user/img/about-product-image.webp') }}" class="img-fluid animation-jump"
                                alt="Image">
                        </div>
                    </div>
                    <!--end about image-->
                    <!--start about info-->
                    <div class="col-md-6">
                        <div class="about-info">
                            <h2>About The Product</h2>
                            <p>Why So Sad? is a cycling and skate-focused campaign founded by John Rattray with the goal of
                                driving awareness, education, and fundraising around mental wellbeing & suicide prevention
                                in the skate community.</p>
                            <ul>
                                <li><i class="icofont-check"></i> Why So Sad?</li>
                                <li><i class="icofont-check"></i> The upper is made from premium leather</li>
                                <li><i class="icofont-check"></i> A Noise Aqua color</li>
                                <li><i class="icofont-check"></i> Complemented by white Swooshes</li>
                                <li><i class="icofont-check"></i> A white midsole for contrast</li>
                                <li><i class="icofont-check"></i> Modern design for a standout look</li>
                                <li><i class="icofont-check"></i> US$ 170</li>
                            </ul>
                        </div>
                    </div>
                    <!--end about info-->
                </div>
            </div>
        </section>
        <!--end about area-->
        <!--start why choose area-->
        <section id="why-chose-area" class="bg-gray">
            <div class="circle-bg"></div>
            <div class="container-fluid">
                <div class="row bg-white py-5">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                            <div class="section-heading text-center">
                                <h2>Why Choose "Air Jordan 1 Low"</h2>
                            </div>
                        </div>
                    </div>
                    <!--start product gallery-->
                    <div class="col-lg-5 col-md-6">
                        <div class="product-gallery owl-carousel">
                            <img src="{{ asset('user/img/choose-product-img1.webp') }}" class="img-fluid" alt>
                            <img src="{{ asset('user/img/choose-product-img2.webp') }}" class="img-fluid" alt>
                            <img src="{{ asset('user/img/choose-product-img3.webp') }}" class="img-fluid" alt>
                            <img src="{{ asset('user/img/choose-product-img4.webp') }}" class="img-fluid" alt>
                        </div>
                    </div>
                    <!--end product gallery-->
                    <!--start why choose content-->
                    <div class="col-lg-7 col-md-6">
                        <div class="why-chose-cont row">
                            <!--start feature single-->
                            <div class="col-lg-6">
                                <div class="why-chose-single">
                                    <i class="icofont-brand-nike"></i>
                                    <h4>Quality Materials</h4>
                                    <p>Pure leather, comfy textile lining and strong rubber sole</p>
                                </div>
                            </div>
                            <!--end feature single-->
                            <!--start feature single-->
                            <div class="col-lg-6">
                                <div class="why-chose-single">
                                    <i class="icofont-brand-nike"></i>
                                    <h4>Awesome Design </h4>
                                    <p>It features a premium leather upper, an air sole element for comfort, and the
                                        distinctive red emblem on the tongue and insole.</p>
                                </div>
                            </div>
                            <!--end feature single-->
                            <!--start feature single-->
                            <div class="col-lg-6">
                                <div class="why-chose-single">
                                    <i class="icofont-brand-nike"></i>
                                    <h4>Signature Aspect of Renown</h4>
                                    <p>The Air Jordan 1 Low "Bred Toe" is a legendary classic, famous for its timeless
                                        black, red, and white color combination that has influenced many other styles.</p>
                                </div>
                            </div>
                            <!--end feature single-->
                            <!--start feature single-->
                            <div class="col-lg-6">
                                <div class="why-chose-single">
                                    <i class="icofont-brand-nike"></i>
                                    <h4>Stylish and Practical</h4>
                                    <p>This sneaker is suitable for daily wear, featuring a sleek and versatile design that
                                        effortlessly matches with every fashion style.</p>
                                </div>
                            </div>
                            <!--end feature single-->
                        </div>
                    </div>
                    <!--end why choose content-->
                </div>
            </div>
        </section>
        <!--end why choose area-->
        <!--start testimonial area-->
        <section class="testi-area bg-gray" data-scroll-index="5">
            <div class="container">
                <div class="row">
                    <!--start section heading-->
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="section-heading text-center">
                            <h2>Our Customer Feedback</h2>
                            <p>We treasure customers' feedback as a guide for our improvement. We're always working to make
                                things better every day. Thank you!</p>
                        </div>
                    </div>
                    <!--end section heading-->
                </div>
                <!--start testimonial carousel-->
                <div class="testi-carousel owl-carousel">
                    <!--start testimonial single-->
                    <div class="testi-single text-center">
                        <div class="client-info">
                            <div class="client-img">
                                <img src="{{ asset('user/img/customer1.jpeg') }}" class="img-fluid" alt>
                            </div>
                            <div class="client-details">
                                <h4>Cole Thomas</h4>
                            </div>
                        </div>
                        <div class="client-comment">
                            <span><i class="icofont-quote-left"></i></span>
                            <p class="mb-2"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></p>
                            <p>Fantastic sneakers! Quick deivery and top-notch quality.Will definitely shop again</p>

                        </div>
                    </div>
                    <!--end testimonial single-->
                    <!--start testimonial single-->
                    <div class="testi-single text-center">
                        <div class="client-info">
                            <div class="client-img">
                                <img src="{{ asset('user/img/customer2.jpg') }}" class="img-fluid" alt>
                            </div>
                            <div class="client-details">
                                <h4>Emma Dee</h4>
                            </div>
                        </div>
                        <div class="client-comment">
                            <span><i class="icofont-quote-left"></i></span>
                            <p class="mb-2"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></p>
                            <p>Impressed with the stylish designs and fast shipping.Great experience overall!</p>

                        </div>
                    </div>
                    <!--end testimonial single-->
                    <!--start testimonial single-->
                    <div class="testi-single text-center">
                        <div class="client-info">
                            <div class="client-img">
                                <img src="{{ asset('user/img/customer3.jpg') }}" class="img-fluid" alt>
                            </div>
                            <div class="client-details">
                                <h4>Andrew Watt</h4>
                            </div>
                        </div>
                        <div class="client-comment">
                            <span><i class="icofont-quote-left"></i></span>
                            <p class="mb-2"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></p>
                            <p>Loving my new sneakers!Easy ordering,fast delivery and excellent customer service.</p>

                        </div>
                    </div>
                    <!--end testimonial single-->
                    <!--start testimonial single-->
                    <div class="testi-single text-center">
                        <div class="client-info">
                            <div class="client-img">
                                <img src="{{ asset('user/img/customer4.jpg') }}" class="img-fluid" alt>
                            </div>
                            <div class="client-details">
                                <h4>Olivia Smith</h4>
                            </div>
                        </div>
                        <div class="client-comment">
                            <span><i class="icofont-quote-left"></i></span>
                            <p class="mb-2"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></p>
                            <p>The variety of styles on your website is impressive. I found the perfect pair that suits my
                                taste perfectly.</p>

                        </div>
                    </div>
                    <!--end testimonial single-->
                    <!--start testimonial single-->
                    <div class="testi-single text-center">
                        <div class="client-info">
                            <div class="client-img">
                                <img src="{{ asset('user/img/customer5.jpg') }}" class="img-fluid" alt>
                            </div>
                            <div class="client-details">
                                <h4>John Nolan</h4>
                            </div>
                        </div>
                        <div class="client-comment">
                            <span><i class="icofont-quote-left"></i></span>
                            <p class="mb-2"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></p>
                            <p>I appreciate the detailed product descriptions and sizing information. It helped me make an
                                informed decision.</p>

                        </div>
                    </div>
                    <!--end testimonial single-->
                </div>
                <!--end testimonial carousel-->
            </div>
        </section>
        <!--end testimonial area-->

    </div>
@endsection
