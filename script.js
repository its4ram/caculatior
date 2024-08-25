// script.js
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('display');
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const profileIcon = document.getElementById('profile-icon');
    const profileMenu = document.querySelector('.profile-menu');
    const header = document.querySelector('header');

    function appendToDisplay(value) {
        display.value += value;
    }

    function clearDisplay() {
        display.value = '';
    }

    function calculate() {
        try {
            display.value = eval(display.value);
        } catch {
            display.value = 'Error';
        }
    }

    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        // Change the emoji based on the mode
        darkModeToggle.textContent = document.body.classList.contains('dark-mode') ? '🌞' : '🌙';
    });

    profileIcon.addEventListener('click', () => {
        profileMenu.style.display = profileMenu.style.display === 'none' || profileMenu.style.display === '' ? 'block' : 'none';
    });

    // Hide the profile menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!profileIcon.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.style.display = 'none';
        }
    });

    // Add scroll event listener to trigger slide-in effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Expose functions to global scope for onclick handlers
    window.appendToDisplay = appendToDisplay;
    window.clearDisplay = clearDisplay;
    window.calculate = calculate;
});