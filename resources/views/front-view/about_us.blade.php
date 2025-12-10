<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us | Stori8</title>
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
    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Left Image Section -->
            <div class="col-md-6 text-center overlay-text">
                <img src="{{ asset('imges/aboutpage.png') }}" alt="Graphic Design" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>

            <!-- Right Text Section with Orange Overlay -->
            <div class="col-md-6 position-relative text-content-container">
                <!-- Text Content -->
                <div class="overlay-text">
                    <h2 class="mb-3">What We Do</h2>
                    <p class="lead">Stori8 is a motion graphics and graphic design studio.</p>
                    <p>
                        At Stori8, we specialize in bringing your brand to life with creative and impactful graphic design solutions.
                        Whether you're looking to make a statement on social media, enhance your marketing materials, or create engaging
                        2D animations, we are here to help!
                    </p>
                    <p>
                        We are passionate about helping businesses of all sizes connect with their audiences through visually stunning designs.
                        Let us transform your ideas into compelling visuals that leave a lasting impression!
                    </p>
                    <p><strong>Offerings include:</strong> Graphics Design | 2D Animation | Explainer Videos | Video Editing and Production</p>
                </div>

                <!-- Orange Background Overlay -->

            </div>
            <div class="orange-bar"></div>
        </div>
    </div>


    <a href="https://wa.me/1234567890" target="_blank" id="whatsappOverlay">
        <img src="{{ asset('imges/animation.gif') }}" alt="WhatsApp">
    </a>


    @include('sections/footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
