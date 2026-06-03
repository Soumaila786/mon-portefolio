<section class="hero" id="hero">
    <div class="hero-inner">

        {{-- Floating badges --}}
        <div class="hero-badge">
            <span class="badge-dot"></span>
            <span>Disponible pour des projets</span>
        </div>

        <div class="hero-text">
            <p class="hero-greeting mono">Bonjour, je suis —</p>
            <h1 class="hero-title">
                <span class="title-line" data-text="LANKOANDE">LANKOANDE</span>
                <span class="title-line accent-line">Full-Stack</span>
                <span class="title-line">Developer.</span>
            </h1>
            <p class="hero-desc">
                Je construis des applications web performantes et élégantes. 
                Spécialisé en <span class="tag">Laravel</span>, <span class="tag">PHP</span>, 
                et <span class="tag">Vue.js</span> — du back-end solide au front-end soigné.
            </p>
        </div>

        <div class="hero-actions">
            <a href="#projects" class="btn btn-primary">
                <span>Voir mes projets</span>
                <i class="fas fa-arrow-right"></i>
            </a>
            <a href="#contact" class="btn btn-ghost">Travaillons ensemble</a>
        </div>

        <div class="hero-stats">
            <div class="stat">
                <span class="stat-num" data-target="3">0</span><span class="stat-plus">+</span>
                <span class="stat-label">Ans d'expérience</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <span class="stat-num" data-target="15">0</span><span class="stat-plus">+</span>
                <span class="stat-label">Projets réalisés</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <span class="stat-num" data-target="8">0</span><span class="stat-plus">+</span>
                <span class="stat-label">Technologies maîtrisées</span>
            </div>
        </div>
    </div>

    {{-- Decorative right side --}}
    <div class="hero-visual">
        <div class="code-card">
            <div class="code-header">
                <span class="dot red"></span>
                <span class="dot yellow"></span>
                <span class="dot green"></span>
                <span class="code-filename mono">developer.php</span>
            </div>
            <pre class="code-body"><code><span class="c-keyword">class</span> <span class="c-class">LANKOANDE</span> <span class="c-keyword">extends</span> <span class="c-class">Developer</span>
{
    <span class="c-keyword">public</span> <span class="c-fn">__construct</span>()
    {
        <span class="c-var">$this</span>-><span class="c-prop">stack</span> = [
            <span class="c-str">'Laravel'</span>,
            <span class="c-str">'Vue.js'</span>,
            <span class="c-str">'MySQL'</span>,
            <span class="c-str">'Python'</span>,
        ];
        <span class="c-var">$this</span>-><span class="c-prop">passion</span> = <span class="c-str">'∞'</span>;
    }
}</code></pre>
        </div>

        <div class="floating-chip chip-1 mono">Laravel 11</div>
        <div class="floating-chip chip-2 mono">Vue 3</div>
        <div class="floating-chip chip-3 mono">MySQL</div>
    </div>

    {{-- Scroll indicator --}}
    <div class="scroll-indicator">
        <span class="mono">scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>
