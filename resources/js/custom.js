document.addEventListener("DOMContentLoaded", () => {
    // Clock Display
    const clockDisplay = document.getElementById("clockDisplay");
    function updateClock() {
        const now = new Date();
        const options = {
            weekday: "short",
            year: "numeric",
            month: "short",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
            hour12: true,
        };
        if (clockDisplay) {
            clockDisplay.textContent = now.toLocaleDateString("en-US", options);
        }
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Sidebar Toggle
    const menuBtn = document.getElementById("menuBtn");
    const sidebar = document.getElementById("sidebar");
    const sidebarOverlay = document.getElementById("sidebarOverlay");
    const closeSidebar = document.getElementById("closeSidebar");

    function toggleSidebar(open = null) {
        const isOpen = !sidebar.classList.contains("-translate-x-full");
        const shouldOpen = open ?? !isOpen;

        if (shouldOpen) {
            sidebar.classList.remove("-translate-x-full");
            sidebarOverlay.classList.remove("opacity-0", "pointer-events-none");
        } else {
            sidebar.classList.add("-translate-x-full");
            sidebarOverlay.classList.add("opacity-0", "pointer-events-none");
        }
    }

    // Click events
    menuBtn?.addEventListener("click", () => toggleSidebar(true));
    closeSidebar?.addEventListener("click", () => toggleSidebar(false));
    sidebarOverlay?.addEventListener("click", () => toggleSidebar(false));

    // Spacebar toggle
    document.addEventListener("keydown", (e) => {
        if (e.code === "Space" && !sidebar.classList.contains("-translate-x-full")) {
            e.preventDefault();
            toggleSidebar(false);
        }
    });

    // Swipe detection
    let touchStartX = 0;
    let touchEndX = 0;

    document.addEventListener("touchstart", (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    document.addEventListener("touchend", (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleGesture();
    });

    function handleGesture() {
        const deltaX = touchEndX - touchStartX;

        // Swipe right to open (from left edge)
        if (deltaX > 50 && sidebar.classList.contains("-translate-x-full") && touchStartX < 50) {
            toggleSidebar(true);
        }
        // Swipe left to close
        if (deltaX < -50 && !sidebar.classList.contains("-translate-x-full")) {
            toggleSidebar(false);
        }
    }



    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Banner Slider
    let currentSlide = 0;
    const slides = document.querySelectorAll('.banner-slide');
    const indicators = document.querySelectorAll('.slide-indicator');

   function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add('active');
            slide.style.pointerEvents = 'auto';
            slide.style.opacity = '1';
        } else {
            slide.classList.remove('active');
            slide.style.pointerEvents = 'none';
            slide.style.opacity = '0';
        }
    });

    indicators.forEach((indicator, i) => {
        indicator.classList.toggle('opacity-100', i === index);
        indicator.classList.toggle('opacity-50', i !== index);
    });
}

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Auto slide every 8 seconds
    setInterval(nextSlide, 8000);

    // Manual slide control
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }

    // Intersection Observer for counters
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.stat-counter').forEach(counter => {
        counterObserver.observe(counter);
    });

    // Back to Top Button
    const backToTopBtn = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove('hidden');
            backToTopBtn.classList.add('flex');
        } else {
            backToTopBtn.classList.add('hidden');
            backToTopBtn.classList.remove('flex');
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Smooth Scroll for Navigation Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');

            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                const offset = 80; // Height of fixed navbar
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                mobileMenu.classList.add('hidden');
            }
        });
    });

    // Navbar scroll effect
    const nav = document.querySelector('nav');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;

        if (currentScroll > 100) {
            nav.classList.add('shadow-xl');
        } else {
            nav.classList.remove('shadow-xl');
        }

        lastScroll = currentScroll;
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Prevent body scroll when mobile menu is open
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                const isHidden = mobileMenu.classList.contains('hidden');
                if (!isHidden && window.innerWidth < 1024) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }
        });
    });

    observer.observe(mobileMenu, { attributes: true });



    // Add entrance animations on scroll
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.service-card, .property-card, .bg-white.rounded-xl');

        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';

                    setTimeout(() => {
                        entry.target.style.transition = 'all 0.6s ease';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 100);

                    scrollObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(el => scrollObserver.observe(el));
    };

    // Initialize animations after page load
    window.addEventListener('load', animateOnScroll);

    // Keyboard navigation for accessibility
    document.addEventListener('keydown', (e) => {
        // ESC key closes mobile menu
        if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
        }

        // Enter key on indicators changes slides
        if (e.key === 'Enter' && e.target.classList.contains('slide-indicator')) {
            const slideIndex = parseInt(e.target.getAttribute('data-slide'));
            currentSlide = slideIndex;
            showSlide(currentSlide);
        }
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }, 250);
    });

    // Lazy load images (optional enhancement)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Add ripple effect to buttons
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function (e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s ease-out';
            ripple.style.pointerEvents = 'none';

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation via style tag
    const style = document.createElement('style');
    style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
    document.head.appendChild(style);

    console.log('Pamoja Chambers website loaded successfully!');

});