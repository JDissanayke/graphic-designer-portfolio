
document.addEventListener('DOMContentLoaded', function () {

    // Mobile Menu Toggle
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const body = document.body;

    if (menuToggle && mobileMenuOverlay) {
        menuToggle.addEventListener('click', function () {
            this.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');

            // Prevent scrolling when menu is open
            if (mobileMenuOverlay.classList.contains('active')) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = 'visible';
            }
        });

        // Close menu when clicking a link
        const navLinks = document.querySelectorAll('.mobile-nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                mobileMenuOverlay.classList.remove('active');
                body.style.overflow = 'visible';
            });
        });
    }

    // Project Details Modal Logic
    const projectModal = document.getElementById('projectModal');
    if (projectModal) {
        projectModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;


            // Extract info
            const title = button.getAttribute('data-title');
            const mainImage = button.getAttribute('data-image');
            const secondTitle = button.getAttribute('data-second-title') || '';
            // Get description from hidden div to preserve formatting
            const descriptionDiv = button.querySelector('.post-description');
            const description = descriptionDiv ? descriptionDiv.innerHTML : '';

            // Additional Images
            const image1 = button.getAttribute('data-image1');
            const image2 = button.getAttribute('data-image2');
            const image3 = button.getAttribute('data-image3');

            // Links
            const link1 = button.getAttribute('data-link1');
            const link2 = button.getAttribute('data-link2');
            const link3 = button.getAttribute('data-link3');

            // Update the modal's content.
            const modalTitle = projectModal.querySelector('#modalTitle');
            const modalSecondTitle = projectModal.querySelector('#modalSecondTitle');
            const modalDescription = projectModal.querySelector('#modalDescription');
            const modalMainImage = projectModal.querySelector('#modalMainImage');
            const modalAdditionalImages = projectModal.querySelector('#modalAdditionalImages');
            const modalLinks = projectModal.querySelector('#modalLinks');

            modalTitle.textContent = title;
            modalDescription.innerHTML = description; // Use innerHTML
            modalMainImage.src = mainImage;

            if (secondTitle) {
                modalSecondTitle.textContent = secondTitle;
                modalSecondTitle.style.display = 'block';
            } else {
                modalSecondTitle.style.display = 'none';
            }

            // Handle Additional Images
            modalAdditionalImages.innerHTML = '';
            [image1, image2, image3].forEach(imgSrc => {
                if (imgSrc) {
                    const col = document.createElement('div');
                    col.classList.add('col-4');
                    col.innerHTML = `
                        <div style="height: 80px; width: 100%; cursor: pointer;" onclick="document.getElementById('modalMainImage').src='${imgSrc}'">
                            <img src="${imgSrc}" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;" alt="Detail Image">
                        </div>`;
                    modalAdditionalImages.appendChild(col);
                }
            });

            // Handle Links
            modalLinks.innerHTML = '';
            [link1, link2, link3].forEach(link => {
                if (link) {
                    const anchor = document.createElement('a');
                    anchor.href = link;
                    anchor.target = "_blank";
                    anchor.classList.add('btn', 'btn-outline-dark', 'btn-sm', 'text-start', 'text-truncate');
                    anchor.style.maxWidth = "100%";
                    anchor.innerHTML = `<i class="bi bi-link-45deg me-2"></i> ${link}`;
                    modalLinks.appendChild(anchor);
                }
            });
        });

        // Reset main image on close
        projectModal.addEventListener('hidden.bs.modal', function () {
            const modalMainImage = projectModal.querySelector('#modalMainImage');
            modalMainImage.src = '';
        });
    }

});

// Independent script for Dark Mode logic
(function () {
    function initDarkMode() {
        const body = document.body;

        // Icon elements
        const desktopSun = document.getElementById('desktopThemeIcon');
        const desktopMoon = document.getElementById('desktopThemeIconMoon');
        const mobileSun = document.getElementById('mobileThemeIcon');
        const mobileMoon = document.getElementById('mobileThemeIconMoon');

        function updateIcons(isDark) {
            const displaySun = isDark ? 'none' : 'inline';
            const displayMoon = isDark ? 'inline' : 'none';

            if (desktopSun) desktopSun.style.display = displaySun;
            if (desktopMoon) desktopMoon.style.display = displayMoon;

            if (mobileSun) mobileSun.style.display = displaySun;
            if (mobileMoon) mobileMoon.style.display = displayMoon;
        }

        function toggleTheme(isChecked) {
            if (isChecked) {
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            }

            // Sync all switches
            const allSwitches = document.querySelectorAll('#darkModeSwitch, #darkModeSwitchMobile');
            allSwitches.forEach(sw => sw.checked = isChecked);

            updateIcons(isChecked);
        }

        // Initialize state
        const currentTheme = localStorage.getItem('theme');
        const isDark = currentTheme === 'dark';
        if (isDark) {
            body.classList.add('dark-mode');
        }

        // Initial sync of switches and icons
        const allSwitches = document.querySelectorAll('#darkModeSwitch, #darkModeSwitchMobile');
        allSwitches.forEach(sw => sw.checked = isDark);
        updateIcons(isDark);

        // Event Delegation for robustness
        document.addEventListener('change', function (e) {
            if (e.target.id === 'darkModeSwitch' || e.target.id === 'darkModeSwitchMobile') {
                toggleTheme(e.target.checked);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDarkMode);
    } else {
        initDarkMode();
    }
})();
