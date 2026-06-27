import '../css/public.css';
import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    // Header scroll effect
    const header = document.querySelector('[data-header]');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Hero animations
    const heroContent = document.querySelector('[data-hero-content]');
    if (heroContent) {
        const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });
        tl.fromTo(heroContent.querySelectorAll('[data-animate]'),
            { y: 60, opacity: 0 },
            { y: 0, opacity: 1, duration: 1, stagger: 0.2, delay: 0.3 }
        );
    }

    // Stats counter animation
    const counters = document.querySelectorAll('[data-counter]');
    if (counters.length) {
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.target);
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                counter.textContent = Math.round(current).toLocaleString();
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target.toLocaleString();
                            }
                        };
                        updateCounter();
                        observer.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });
            observer.observe(counter);
        });
    }

    // Scroll animations with GSAP
    gsap.utils.toArray('[data-gsap]').forEach(element => {
        const animation = element.dataset.gsap;
        switch (animation) {
            case 'fade-up':
                gsap.fromTo(element,
                    { y: 60, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.8, ease: 'power3.out',
                      scrollTrigger: { trigger: element, start: 'top 85%', toggleActions: 'play none none reverse' } }
                );
                break;
            case 'fade-left':
                gsap.fromTo(element,
                    { x: -60, opacity: 0 },
                    { x: 0, opacity: 1, duration: 0.8, ease: 'power3.out',
                      scrollTrigger: { trigger: element, start: 'top 85%' } }
                );
                break;
            case 'fade-right':
                gsap.fromTo(element,
                    { x: 60, opacity: 0 },
                    { x: 0, opacity: 1, duration: 0.8, ease: 'power3.out',
                      scrollTrigger: { trigger: element, start: 'top 85%' } }
                );
                break;
            case 'scale-in':
                gsap.fromTo(element,
                    { scale: 0.8, opacity: 0 },
                    { scale: 1, opacity: 1, duration: 0.8, ease: 'back.out(1.7)',
                      scrollTrigger: { trigger: element, start: 'top 85%' } }
                );
                break;
            case 'stagger':
                const children = element.children;
                gsap.fromTo(children,
                    { y: 40, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'power3.out',
                      scrollTrigger: { trigger: element, start: 'top 85%' } }
                );
                break;
        }
    });

    // Hero parallax
    const heroParallax = document.querySelector('[data-parallax]');
    if (heroParallax) {
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            heroParallax.style.transform = `translateY(${scrolled * 0.3}px)`;
        });
    }

    // Course Swiper
    const courseSwiper = new Swiper('[data-swiper="courses"]', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { clickable: true, el: '[data-swiper-pagination="courses"]' },
        navigation: { nextEl: '[data-swiper-next="courses"]', prevEl: '[data-swiper-prev="courses"]' },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
            1280: { slidesPerView: 4 }
        }
    });

    // Testimonials Swiper
    const testimonialSwiper = new Swiper('[data-swiper="testimonials"]', {
        modules: [Navigation, Pagination, Autoplay, EffectFade],
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: { delay: 6000, disableOnInteraction: false },
        pagination: { clickable: true, el: '[data-swiper-pagination="testimonials"]' },
        navigation: { nextEl: '[data-swiper-next="testimonials"]', prevEl: '[data-swiper-prev="testimonials"]' }
    });

    // Teachers Swiper
    const teacherSwiper = new Swiper('[data-swiper="teachers"]', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { clickable: true, el: '[data-swiper-pagination="teachers"]' },
        navigation: { nextEl: '[data-swiper-next="teachers"]', prevEl: '[data-swiper-prev="teachers"]' },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
            1280: { slidesPerView: 4 }
        }
    });

    // Mobile menu toggle
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            document.body.classList.toggle('overflow-hidden');
        });
    }

    // Course search/filter
    const searchInput = document.querySelector('[data-course-search]');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('[data-course-card]').forEach(card => {
                const title = card.dataset.title?.toLowerCase() || '';
                card.style.display = title.includes(query) ? '' : 'none';
            });
        });
    }

    // Enroll stepper
    const stepper = document.querySelector('[data-stepper]');
    if (stepper) {
        const steps = stepper.querySelectorAll('[data-step]');
        const nextBtns = stepper.querySelectorAll('[data-next]');
        const prevBtns = stepper.querySelectorAll('[data-prev]');
        let currentStep = 0;

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle('hidden', i !== index);
            });
            stepper.querySelectorAll('[data-step-indicator]').forEach((ind, i) => {
                ind.classList.toggle('active', i <= index);
                ind.classList.toggle('completed', i < index);
            });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
    }

    // Smooth scroll anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

});
