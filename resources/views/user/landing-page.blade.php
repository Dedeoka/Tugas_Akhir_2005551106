@extends('layouts.user')
@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('images/dharma-jati-2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Panti Asuhan
                        Dharma Jati II</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-counter ftco-intro" id="section-counter">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-1 align-items-stretch">
                        <div class="text">
                            <span>Anak Asuh</span>
                            <strong class="number" data-number="1432805">0</strong>
                            {{-- <span>Children in 190 countries in the world</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-2 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Donasi Panti Asuhan</h3>
                            <p><b>Kita Bernilai </b>bukan karena apa yang kita miliki, tapi apa
                                yang bisa kita berikan</p>
                            <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Donasi Sekarang</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-3 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Program Acara Bersama</h3>
                            <p>Membuat acara dan berbagi <b>kebahagiaan</b> di Panti Asuhan bersama dengan anak asuh</p>
                            <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Buat Acara</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Berdonasi</h3>
                            <p><b>Kita Bernilai </b>bukan karena apa yang kita miliki, tapi apa
                                yang bisa kita berikan</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
                        <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Become A Volunteer</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Program Acara Bersama Panti</h3>
                            <p>Membuat acara dan berbagi <b>kebahagiaan</b> di Panti Asuhan bersama dengan anak asuh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-5 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Acara Bersama Panti</h2>
                    <p>Daftar acara buatan donatur bersama panti asuhan Dharma Jati II</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-cause owl-carousel">
                        <div class="item">
                            <div class="cause-entry">
                                <a href="#" class="img"
                                    style="background-image: url('{{ asset('images/dharma-jati-2.jpg') }}');"></a>
                                <div class="text p-3 p-md-4">
                                    <h3><a href="#">Clean water for the urban area</a></h3>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an
                                        almost unorthographic life</p>
                                    <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                                    <div class="progress custom-progress-success">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%"
                                            aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cause-entry">
                                <a href="#" class="img"
                                    style="background-image: url('{{ asset('images/dharma-jati-2.jpg') }}');"></a>
                                <div class="text p-3 p-md-4">
                                    <h3><a href="#">Clean water for the urban area</a></h3>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an
                                        almost unorthographic life</p>
                                    <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                                    <div class="progress custom-progress-success">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%"
                                            aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Acara Internal Panti Asuhan</h2>
                    <p>Daftar acara internal panti asuhan Dharma Jati II</p>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="d-md-flex">
            <a href="images/cause-2.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/cause-2.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/cause-3.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/cause-3.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/cause-4.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/cause-4.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/cause-5.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/cause-5.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
        </div>
        <div class="d-md-flex">
            <a href="images/cause-6.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/cause-6.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/image_3.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/image_3.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/image_1.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/image_1.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            <a href="images/image_2.jpg"
                class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
                style="background-image: url(images/image_2.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Pengumuman Panti Asuhan</h2>
                    <p>Daftar pengumuman terbaru panti asuhan Dharma Jati II</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/event-1.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>
                                    10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span>
                            </p>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/event-2.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>
                                    10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span>
                            </p>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <p><a href="event.html">Selengkapnya <i class="ion-ios-arrow-forward"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/event-2.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>
                                    10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span>
                            </p>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <p><a href="event.html">Selengkapnya <i class="ion-ios-arrow-forward"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
