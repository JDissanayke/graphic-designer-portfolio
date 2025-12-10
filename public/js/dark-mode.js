document.addEventListener('DOMContentLoaded', function() {
    const body = document.getElementById('body');
    const navbar = document.getElementById('navbar');
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const darkModeLabel = document.getElementById('darkModeLabel');
    const workLink = document.getElementById('workLink');
    const aboutLink = document.getElementById('aboutLink');
    const nvalogo = document.getElementById('nvalogo');
    const footerlogo = document.getElementById ('footerlogo');

    // Define colors and logos
    const darkLogo = nvalogo.getAttribute('data-dark-logo');
    const lightLogo = nvalogo.getAttribute('data-light-logo');

     const ftlightLogo = footerlogo.getAttribute('data-light-foot-logo');
    const ftdarkLogo = footerlogo.getAttribute('data-dark-foot-logo');




    const lightModeColor = '#5a5fee';
    const darkModeColor = '#f35a55';
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)');

    // Set the correct initial state based on localStorage or system preference
    if (localStorage.getItem('darkMode') === 'enabled') {
        enableDarkMode();
        darkModeSwitch.checked = true;
    } else if (localStorage.getItem('darkMode') === 'disabled') {
        enableLightMode();
        darkModeSwitch.checked = false;
    } else if (systemPrefersDark.matches) {
        enableDarkMode();
        darkModeSwitch.checked = true;
    } else {
        enableLightMode();
        darkModeSwitch.checked = false;
    }

    // Listen for system dark mode changes
    systemPrefersDark.addEventListener('change', (e) => {
        if (e.matches) {
            enableDarkMode();
            darkModeSwitch.checked = true;
        } else {
            enableLightMode();
            darkModeSwitch.checked = false;
        }
    });

    // Toggle dark mode on switch change
    darkModeSwitch.addEventListener('change', () => {
        if (darkModeSwitch.checked) {
            enableDarkMode();
        } else {
            enableLightMode();
        }
    });

    function enableDarkMode() {
        body.classList.remove('bg-light', 'text-dark');
        body.classList.add('bg-dark', 'text-light');
        navbar.classList.remove('navbar-light', 'bg-light');
        navbar.classList.add('navbar-dark', 'bg-dark');

        // Change link colors to dark mode color
        workLink.style.color = darkModeColor;
        aboutLink.style.color = darkModeColor;
        nvalogo.src = darkLogo;
        footerlogo.src=ftdarkLogo;

        // Change toggle switch and label colors
        darkModeSwitch.style.backgroundColor = darkModeColor;
        darkModeLabel.style.color = darkModeColor;

        // Save dark mode state
        localStorage.setItem('darkMode', 'enabled');
    }

    function enableLightMode() {
        body.classList.remove('bg-dark', 'text-light');
        body.classList.add('bg-light', 'text-dark');
        navbar.classList.remove('navbar-dark', 'bg-dark');
        navbar.classList.add('navbar-light', 'bg-light');

        // Change link colors to light mode color
        workLink.style.color = lightModeColor;
        aboutLink.style.color = lightModeColor;
        nvalogo.src = lightLogo;
        footerlogo.src=ftlightLogo;

        // Change toggle switch and label colors
        darkModeSwitch.style.backgroundColor = lightModeColor;
        darkModeLabel.style.color = lightModeColor;

        // Save light mode state
        localStorage.setItem('darkMode', 'disabled');
    }
});
