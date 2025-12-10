<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | Stori8</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/whatsapp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>




<body id="body" class="bg-light text-dark">
    <!-- Include Navbar -->
    @include('sections/navbar')

    <div class="container mt-5">
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
                                style="background-image:url({{ asset('front') }});">
                                <div class="overlay"></div>
                            </div>
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax="properties: { translateY: '70%' }">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script></script>

        </section>


        <div class="posts-grid-container">
            @foreach($workItems->chunk(2) as $row)
                <div class="posts-row">
                    @foreach($row as $workItem)
                        <a href="javascript:void(0);" class="post-card-link" data-bs-toggle="modal"
                            data-bs-target="#projectModal" data-title="{{ $workItem->title }}"
                            data-image="{{ asset('storage/' . $workItem->image) }}" @if($workItem->details)
                                data-second-title="{{ $workItem->details->second_title }}"
                                data-image1="{{ $workItem->details->image1 ? asset('storage/' . $workItem->details->image1) : '' }}"
                                data-image2="{{ $workItem->details->image2 ? asset('storage/' . $workItem->details->image2) : '' }}"
                                data-image3="{{ $workItem->details->image3 ? asset('storage/' . $workItem->details->image3) : '' }}"
                                data-link1="{{ $workItem->details->link1 }}" data-link2="{{ $workItem->details->link2 }}"
                            data-link3="{{ $workItem->details->link3 }}" @endif>
                            <div class="d-none post-description">
                                @if($workItem->details && $workItem->details->Description)
                                    {!! nl2br(e($workItem->details->Description)) !!}
                                @endif
                            </div>
                            <div class="post-card">
                                <div class="post-card-img-container">
                                    <img class="post-card-img" src="{{ asset('storage/' . $workItem->image) }}"
                                        alt="Card image">
                                </div>
                                <div class="post-card-body">
                                    <p class="post-card-text">{{ $workItem->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <a href="https://wa.me/1234567890" target="_blank" id="whatsappOverlay">
        <img src="{{ asset('imges/animation.gif') }}" alt="WhatsApp">
    </a>


    <!-- Project Details Modal -->
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Main Image / Carousel -->
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div id="modalImageContainer">
                                <img src="" id="modalMainImage" class="img-fluid rounded mb-3" alt="Project Image">
                                <!-- Additional images can be appended here if we want a gallery/grid -->
                                <div class="row g-2" id="modalAdditionalImages">
                                    <!-- Dynamic images injected here -->
                                </div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="col-md-6">
                            <h2 class="modal-title fw-bold mb-2" id="modalTitle"></h2>
                            <h4 class="text-muted mb-4" id="modalSecondTitle"></h4>

                            <!-- Changed to innerHTML to support <br> tags -->
                            <div class="mb-4" id="modalDescription"></div>

                            <div class="d-flex flex-column gap-2" id="modalLinks">
                                <!-- Dynamic links injected here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sections/footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>