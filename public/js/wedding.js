// Wedding Site JavaScript

// PROTEÇÃO GLOBAL: Não executar scripts no domínio do Mercado Pago
(function() {
    'use strict';
    
    // Verificação robusta de hostname
    const hostname = window.location.hostname || '';
    const href = window.location.href || '';
    
    if (hostname.includes('mercadopago') || 
        hostname.includes('mercadolivre') ||
        href.includes('/checkout/v1/') ||
        href.includes('/checkout/v1/payment/redirect') ||
        href.includes('/review/?preference-id') ||
        href.includes('mercadopago.com.br/checkout') ||
        href.includes('sandbox.mercadopago.com.br')) {
        // Não executar nada se estiver no domínio do Mercado Pago
        console.log('Scripts isolados: domínio do Mercado Pago detectado', hostname);
        return;
    }
    
    // Continuar execução apenas se não estiver no Mercado Pago
    document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all sections
    document.querySelectorAll('.section-fullscreen').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(section);
    });
    
    // Form submission handling
    const rsvpForm = document.querySelector('.rsvp-form');
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', function(e) {
            // Let the form submit normally to Laravel
            // The form will be handled by the server
        });
    }
    
    // Show success message if redirected with success
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') || window.location.hash === '#success') {
        alert('Obrigado por confirmar sua presença! Entraremos em contato em breve.');
    }
    
    // Info buttons toggle functionality
    const infoButtons = document.querySelectorAll('.info-button');
    const infoContents = document.querySelectorAll('.info-content');
    
    infoButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);
            
            // Toggle active state
            const isActive = this.classList.contains('active');
            
            // Remove active state from all buttons
            infoButtons.forEach(btn => btn.classList.remove('active'));
            
            // Hide all content
            infoContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // If button was not active, activate it and show content
            if (!isActive) {
                this.classList.add('active');
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                }
            }
        });
    });
    
    // Countdown timer - ISOLADO: só executa se os elementos existirem
    const daysEl = document.getElementById('days');
    const hoursEl = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');
    
    // Só executar countdown se os elementos existirem (não está no Mercado Pago)
    if (daysEl && hoursEl && minutesEl && secondsEl) {
        const weddingDate = new Date('2026-05-09T15:00:00').getTime();
        let countdownInterval = null;
        
        function updateCountdown() {
            // PROTEÇÃO DUPLA: Verificar hostname dentro da função também
            if (location.hostname.includes('mercadopago') || 
                location.hostname.includes('mercadolivre') ||
                location.href.includes('/checkout/v1/') ||
                location.href.includes('/review/?preference-id')) {
                // Limpar intervalo se estiver no Mercado Pago
                if (countdownInterval) {
                    clearInterval(countdownInterval);
                    countdownInterval = null;
                }
                return;
            }
            
            // Verificar novamente se os elementos existem
            const daysElCheck = document.getElementById('days');
            const hoursElCheck = document.getElementById('hours');
            const minutesElCheck = document.getElementById('minutes');
            const secondsElCheck = document.getElementById('seconds');
            
            if (!daysElCheck || !hoursElCheck || !minutesElCheck || !secondsElCheck) {
                // Limpar intervalo se elementos não existirem
                if (countdownInterval) {
                    clearInterval(countdownInterval);
                    countdownInterval = null;
                }
                return;
            }
            
            const now = new Date().getTime();
            const distance = weddingDate - now;
            
            if (distance < 0) {
                daysElCheck.textContent = '0';
                hoursElCheck.textContent = '0';
                minutesElCheck.textContent = '0';
                secondsElCheck.textContent = '0';
                // Limpar intervalo quando terminar
                if (countdownInterval) {
                    clearInterval(countdownInterval);
                    countdownInterval = null;
                }
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            daysElCheck.textContent = days;
            hoursElCheck.textContent = hours;
            minutesElCheck.textContent = minutes;
            secondsElCheck.textContent = seconds;
        }
        
        // Update countdown immediately and then every second
        updateCountdown();
        countdownInterval = setInterval(updateCountdown, 1000);
        
        // Limpar intervalo quando a página for descarregada
        window.addEventListener('beforeunload', function() {
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
        });
    }
    
    // Header visibility on scroll and hover
    const header = document.querySelector('.main-header');
    let lastScrollTop = 0;
    let isHoveringTop = false;
    
    // Detect mouse position near top of page
    document.addEventListener('mousemove', function(e) {
        if (e.clientY <= 80) {
            // Mouse is near top
            if (!isHoveringTop && header) {
                isHoveringTop = true;
                header.classList.add('visible');
            }
        } else {
            // Mouse moved away from top
            if (isHoveringTop && window.scrollY > 100) {
                isHoveringTop = false;
                // Only hide if not hovering over header itself
                setTimeout(() => {
                    if (!header.matches(':hover') && !isHoveringTop) {
                        header.classList.remove('visible');
                    }
                }, 100);
            }
        }
    });
    
    // Show header when hovering over header itself
    if (header) {
        header.addEventListener('mouseenter', function() {
            this.classList.add('visible');
        });
        
        header.addEventListener('mouseleave', function(e) {
            if (window.scrollY > 100 && e.clientY > 80) {
                this.classList.remove('visible');
            }
        });
    }
    
    // Handle scroll behavior
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Show header when scrolling up or at the top
        if (scrollTop < 100) {
            if (header) {
                header.classList.add('visible');
            }
        } else if (scrollTop > lastScrollTop) {
            // Scrolling down - hide header (unless hovering)
            if (header && !isHoveringTop && !header.matches(':hover')) {
                header.classList.remove('visible');
            }
        } else {
            // Scrolling up - show header
            if (header) {
                header.classList.add('visible');
            }
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);
    
    // Show header initially if at top
    if (window.scrollY < 100 && header) {
        header.classList.add('visible');
    }
    });
    
})(); // Fim da IIFE de proteção
