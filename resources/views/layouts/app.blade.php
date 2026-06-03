<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'LANKOANDE — Développeur Full-Stack' }}</title>
    <meta name="description" content="Portfolio de LANKOANDE, Développeur Full-Stack spécialisé Laravel & Vue.js">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="/css/portfolio.css">
</head>
<body>

    {{-- Cursor custom --}}
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-ring" id="cursor-ring"></div>

    {{-- Background grain --}}
    <div class="grain-overlay"></div>

    {{-- Navigation --}}
    <nav class="navbar" id="navbar">
        <div class="nav-logo">
            <span class="logo-bracket">[</span>
            <span class="logo-name">LNK</span>
            <span class="logo-bracket">]</span>
        </div>
        <ul class="nav-links">
            <li><a href="#about" class="nav-link"><span class="nav-num">01.</span> À propos</a></li>
            <li><a href="#skills" class="nav-link"><span class="nav-num">02.</span> Compétences</a></li>
            <li><a href="#projects" class="nav-link"><span class="nav-num">03.</span> Projets</a></li>
            <li><a href="#experience" class="nav-link"><span class="nav-num">04.</span> Parcours</a></li>
            <li><a href="#contact" class="nav-link cta-link">Contact</a></li>
        </ul>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    {{-- Mobile Menu --}}
    <div class="mobile-menu" id="mobile-menu">
        <ul>
            <li><a href="#about" class="mobile-link">01. À propos</a></li>
            <li><a href="#skills" class="mobile-link">02. Compétences</a></li>
            <li><a href="#projects" class="mobile-link">03. Projets</a></li>
            <li><a href="#experience" class="mobile-link">04. Parcours</a></li>
            <li><a href="#contact" class="mobile-link">05. Contact</a></li>
        </ul>
    </div>

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-inner">
            <p class="footer-copy">
                <span class="mono">© {{ date('Y') }}</span> — Conçu & développé par
                <span class="accent">Soumaila LANKOANDE</span>
            </p>
            <div class="footer-socials">
                <a href="https://github.com/Soumaila786/" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/soumaila-lankoande-797a24413/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="/js/portfolio.js"></script>
</body>
</html>
