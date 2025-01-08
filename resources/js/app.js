import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Hamburger menu
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const dropdownMenu = document.getElementById('dropdownMenu');
    
    if (hamburger && dropdownMenu) {
        hamburger.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    }

    // Scroll buttons
    const scrollLeft = document.getElementById('scrollLeft');
    const scrollRight = document.getElementById('scrollRight');
    const insightCards = document.getElementById('insightCards');

    if (scrollLeft && scrollRight && insightCards) {
        scrollLeft.addEventListener('click', () => {
            insightCards.scrollBy({ left: -320, behavior: 'smooth' });
        });

        scrollRight.addEventListener('click', () => {
            insightCards.scrollBy({ left: 320, behavior: 'smooth' });
        });
    }
});

// Slider functionality
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('slider');
    const sliderContainer = document.getElementById('sliderContainer');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const dots = document.querySelectorAll('#sliderDots button');
    
    if (slider && prevButton && nextButton) {
        let currentSlide = 0;
        const slidesCount = 3; // Hanya 3 slide
        
        // Update dots
        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('bg-white', index === currentSlide);
                dot.classList.toggle('bg-gray-400', index !== currentSlide);
            });
        }

        // Slide to specific index
        function slideTo(index) {
            currentSlide = index;
            const offset = -(100 / slidesCount) * currentSlide;
            slider.style.transform = `translateX(${offset}%)`;
            updateDots();
        }

        // Previous slide
        prevButton.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slidesCount) % slidesCount;
            slideTo(currentSlide);
        });

        // Next slide
        nextButton.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slidesCount;
            slideTo(currentSlide);
        });

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                slideTo(index);
            });
        });

        // Initialize dots
        updateDots();

        // Auto slide every 5 seconds
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slidesCount;
            slideTo(currentSlide);
        }, 5000);
    }
});
