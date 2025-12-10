@extends('front-view.layout.front-layout-master')

@section('title', 'Home')

@section('content')

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url({{ asset('fornt-style/images/bg_2.png') }});">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax="properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Welcome to my creative world!</span>
                                <h1 class="mb-4 mt-3">Transfor<span>ming ideas</span> into stunning visuals</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url({{ asset('fornt-style/images/bg_2.png') }});">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex align-items-center ftco-animate"
                            data-scrollax="properties: { translateY: '70%' }">
                            <div class="text">
                                <h1 class="mb-4 mt-3">I'm a <span>graphic designer</span></h1>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a>
                                    <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script></script>

    </section>
    <div class="sss">
        @foreach ($workItems as $project)
            <div class="card ">
                <img src="{{ Storage::url($project->image) }}" alt="Image" />

            </div>
        @endforeach
    </div>



    </section>





    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>


        </div>
    </section>



@endsection