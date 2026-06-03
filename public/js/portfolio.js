/* PORTFOLIO LANKOANDE — JavaScript
═══════════════════════════════════════════ */
// classList : Permet de manipuler les classes CSS.

document.addEventListener('DOMContentLoaded', () => {

  /* ── Custom Cursor ── */
    const dot  = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');

    if (dot && ring) {
        let mouseX = 0, mouseY = 0;
        let ringX = 0, ringY = 0;

        document.addEventListener('mousemove', e => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            dot.style.left = mouseX + 'px';
            dot.style.top  = mouseY + 'px';
        });

        function animateRing() {
            ringX += (mouseX - ringX) * 0.12;
            ringY += (mouseY - ringY) * 0.12;
            ring.style.left = ringX + 'px';
            ring.style.top  = ringY + 'px';
            requestAnimationFrame(animateRing);
        }
        animateRing();
    }

  /* ── Navbar scroll ── */
    const navbar = document.getElementById('navbar');
    const onScroll = () => {
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', onScroll, {
        passive: true
    });

    /* ── Active nav link on scroll ── */
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    const highlightNav = () => {
        const scrollY = window.scrollY + 120;
        sections.forEach(section => {
            const top    = section.offsetTop;
            const height = section.offsetHeight;
            const id     = section.getAttribute('id');
            if (scrollY >= top && scrollY < top + height) {
                navLinks.forEach(link => {
                link.classList.remove('active-link');
                if (link.getAttribute('href') === '#' + id) {
                    link.classList.add('active-link');
                }
                });
            }
        });
    };
    window.addEventListener('scroll', highlightNav, { passive: true });

    /* ── Hamburger / Mobile menu ── */
    const hamburger  = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    hamburger?.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
        const isOpen = mobileMenu.classList.contains('open'); // Verifie voir si la classe existe
        hamburger.setAttribute('aria-expanded', isOpen);
        // si le menu est ouvert : L'utilisateur ne peut plus faire défiler la page.
        document.body.style.overflow = isOpen ? 'hidden' : '';

        // Animate hamburger to X
        const spans = hamburger.querySelectorAll('span');
        if (isOpen) {
            spans[0].style.cssText = 'transform: rotate(45deg) translate(5px, 5px)';
            spans[1].style.cssText = 'opacity: 0; transform: scaleX(0)';
            spans[2].style.cssText = 'transform: rotate(-45deg) translate(5px, -5px)';
        } else {
            spans.forEach(s => s.style.cssText = '');
        }
    });

    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
            hamburger.querySelectorAll('span').forEach(s => s.style.cssText = '');
        });
    });

    /* ── Smooth scroll for anchors ── */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = target.getBoundingClientRect().top + window.scrollY - 80;
                window.scrollTo({ top: offset, behavior: 'smooth' });
            }
        });
    });

    /* ── Intersection Observer — Scroll Reveal ── */
    const revealEls = document.querySelectorAll(
        '.skill-category, .project-card, .timeline-item, .contact-item, ' +
        '.about-grid, .hero-stats, .tech-pills, .about-card'
    );

    revealEls.forEach(el => el.classList.add('reveal'));

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                // Stagger for groups
                const siblings = [...entry.target.parentElement.children];
                const idx = siblings.indexOf(entry.target);
                setTimeout(() => {
                entry.target.classList.add('visible');
                }, idx * 80);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    revealEls.forEach(el => revealObserver.observe(el));

    /* ── Skill bars animation ── */
    const skillBars = document.querySelectorAll('.skill-fill');
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.getAttribute('data-width');
                setTimeout(() => {
                bar.style.width = width + '%';
                }, 200);
                skillObserver.unobserve(bar);
            }
        });
    }, { threshold: 0.3 });

    skillBars.forEach(bar => skillObserver.observe(bar));

    /* ── Counter animation (hero stats) ── */
    const counters = document.querySelectorAll('.stat-num');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el     = entry.target;
                const target = parseInt(el.getAttribute('data-target'));
                const duration = 1800;
                const step   = Math.ceil(duration / target);
                let current  = 0;

                const timer = setInterval(() => {
                    current++;
                    el.textContent = current;
                    if (current >= target) clearInterval(timer);
                }, step);

                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => counterObserver.observe(c));

    /* ── Timeline tabs ── */
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabPanels = {
        experience: document.getElementById('tab-experience'),
        education:  document.getElementById('tab-education'),
    };

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.getAttribute('data-tab');

            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            Object.entries(tabPanels).forEach(([key, panel]) => {
                if (!panel) return;
                if (key === tab) {
                    panel.classList.remove('hidden');
                    // Re-trigger reveal for items in this panel
                    panel.querySelectorAll('.timeline-item').forEach((item, i) => {
                        item.classList.remove('visible');
                        setTimeout(() => item.classList.add('visible'), i * 100);
                    });
                } else {
                panel.classList.add('hidden');
                }
            });
        });
    });

    // Auto-reveal first tab items
    document.querySelectorAll('#tab-experience .timeline-item').forEach((item, i) => {
        item.classList.add('reveal');
        setTimeout(() => item.classList.add('visible'), 300 + i * 120);
    });

    /* ── Tech pills hover ripple ── */
    document.querySelectorAll('.tech-pill').forEach(pill => {
        pill.addEventListener('mouseenter', function(e) {
            const rect = this.getBoundingClientRect();
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                transform: scale(0);
                animation: ripple-effect 0.5s linear;
                background: rgba(0,212,255,0.15);
                width: 80px; height: 80px;
                top: ${e.clientY - rect.top - 40}px;
                left: ${e.clientX - rect.left - 40}px;
                pointer-events: none;
            `;
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 500);
        });
    });

    // Inject ripple keyframe
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple-effect {
        to { transform: scale(2); opacity: 0; }
        }
        .nav-link.active-link { color: var(--accent) !important; }
    `;
    document.head.appendChild(style);

    /* ── Form submit feedback ── */
    const form = document.querySelector('.contact-form');
    if (form) {
        const submitBtn = form.querySelector('[type="submit"]');
        form.addEventListener('submit', () => {
            if (submitBtn) {
                submitBtn.innerHTML = '<span>Envoi en cours...</span><i class="fas fa-spinner fa-spin"></i>';
                submitBtn.disabled = true;
            }
        });
    }

    /* ── Typing effect in hero greeting ── */
    const greetingEl = document.querySelector('.hero-greeting');
    if (greetingEl) {
        const text = greetingEl.textContent;
        greetingEl.textContent = '';
        greetingEl.style.opacity = '1';
        let i = 0;
        const type = () => {
            if (i < text.length) {
                greetingEl.textContent += text[i++];
                setTimeout(type, 60);
            }
        };
        setTimeout(type, 400);
    }

    /* ── Parallax on hero visual ── */
    const heroVisual = document.querySelector('.hero-visual');
    if (heroVisual) {
        document.addEventListener('mousemove', e => {
            const x = (e.clientX / window.innerWidth  - 0.5) * 12;
            const y = (e.clientY / window.innerHeight - 0.5) * 8;
            heroVisual.style.transform = `translate(${x}px, ${y}px)`;
        });
    }

    /* ── Project cards tilt ── */
    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width  - 0.5) * 8;
            const y = ((e.clientY - rect.top)  / rect.height - 0.5) * 8;
            card.style.transform = `translateY(-4px) rotateX(${-y}deg) rotateY(${x}deg)`;
        });
        card.addEventListener('mouseleave', () => {
        card.style.transform = '';
        });
    });

});
