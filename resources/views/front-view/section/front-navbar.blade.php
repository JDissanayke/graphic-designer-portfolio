<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"> <a class="navbar-brand" href="#">
        <img src="{{ asset('imges/logo/Stori8dark.png') }}" width="40px" alt="Logo" id="nvalogo"
       > Stori8
    </a>
      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav ml-auto">
            <li class="nav-item">
              <a href="{{ url('/') }}#home-section" class="nav-link"><span>Home</span></a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/') }}#services-section" class="nav-link"><span>Services</span></a>
            </li>
            <li class="nav-item">
              <a href="{{ route('protfolio') }}#Portfolio" class="nav-link"><span>Portfolio</span></a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/') }}#contact-section" class="nav-link"><span>Contact</span></a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sections = document.querySelectorAll('section');
      const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

      // Function to remove active class from all links
      const removeActiveClasses = () => {
        navLinks.forEach(link => link.classList.remove('active'));
      };

      // Function to add active class to the current link
      const addActiveClass = (id) => {
        removeActiveClasses();
        const activeLink = document.querySelector(`.navbar-nav .nav-link[href*="${id}"]`);
        if (activeLink) activeLink.classList.add('active');
      };

      // Use Intersection Observer to track sections in view
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const sectionId = entry.target.getAttribute('id');
              addActiveClass(sectionId);
            }
          });
        },
        {

        }
      );

      // Observe each section
      sections.forEach(section => {
        if (section.id) observer.observe(section);
      });
    });
  </script>
