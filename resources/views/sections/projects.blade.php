<section class="section" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-num mono">03.</span>
            <h2 class="section-title">Projets</h2>
            <div class="section-line"></div>
        </div>

        <div class="projects-grid">

            {{-- Project 1 - Featured --}}
            <div class="project-card featured">
                <div class="project-meta">
                    <span class="project-tag mono">Laravel · Python · Excel</span>
                    <span class="project-badge">Featured</span>
                </div>
                <h3 class="project-title">Comparateur de PV Académiques</h3>
                <p class="project-desc">
                    Application web qui automatise la comparaison de fichiers Excel de procès-verbaux universitaires.
                    Détection des différences, erreurs et incohérences entre deux versions de PV.
                    Parsing haute-performance via Python/openpyxl (~2s vs ~2min avec PHP pur).
                </p>
                <div class="project-stack">
                    <span>Laravel 10</span>
                    <span>PHP 8.1</span>
                    <span>Python</span>
                    <span>MySQL</span>
                    <span>Bootstrap 5</span>
                </div>
                <div class="project-links">
                    <a href="#" class="project-link"><i class="fab fa-github"></i> Code</a>
                    <a href="#" class="project-link project-link-ext"><i class="fas fa-external-link-alt"></i> Demo</a>
                </div>
                <div class="project-number mono">01</div>
            </div>

            {{-- Project 2 --}}
            <div class="project-card">
                <div class="project-meta">
                    <span class="project-tag mono">Laravel · Vue.js</span>
                </div>
                <h3 class="project-title">Système de Gestion Académique</h3>
                <p class="project-desc">
                    Plateforme de gestion des étudiants, notes et emplois du temps pour établissements universitaires. 
                    Interface admin complète avec export de rapports.
                </p>
                <div class="project-stack">
                    <span>Laravel</span>
                    <span>Vue.js</span>
                    <span>MySQL</span>
                </div>
                <div class="project-links">
                    <a href="#" class="project-link"><i class="fab fa-github"></i> Code</a>
                </div>
                <div class="project-number mono">02</div>
            </div>

            {{-- Project 3 --}}
            <div class="project-card">
                <div class="project-meta">
                    <span class="project-tag mono">Laravel · REST API</span>
                </div>
                <h3 class="project-title">API RESTful — Gestion de Ressources</h3>
                <p class="project-desc">
                    API robuste avec authentification JWT, gestion des rôles et permissions,
                    documentation Swagger intégrée et tests automatisés PHPUnit.
                </p>
                <div class="project-stack">
                    <span>Laravel</span>
                    <span>JWT</span>
                    <span>PHPUnit</span>
                </div>
                <div class="project-links">
                    <a href="#" class="project-link"><i class="fab fa-github"></i> Code</a>
                </div>
                <div class="project-number mono">03</div>
            </div>

            {{-- Project 4 --}}
            <div class="project-card">
                <div class="project-meta">
                    <span class="project-tag mono">PHP · MySQL</span>
                </div>
                <h3 class="project-title">Dashboard Analytics Universitaire</h3>
                <p class="project-desc">
                    Tableau de bord avec visualisation de données statistiques sur les résultats académiques,
                    taux de réussite par filière et génération de rapports PDF.
                </p>
                <div class="project-stack">
                    <span>Laravel</span>
                    <span>Chart.js</span>
                    <span>PDF</span>
                </div>
                <div class="project-links">
                    <a href="#" class="project-link"><i class="fab fa-github"></i> Code</a>
                </div>
                <div class="project-number mono">04</div>
            </div>

        </div>

        <div class="projects-more">
            <a href="#" class="btn btn-ghost">
                Voir tous les projets sur GitHub
                <i class="fab fa-github"></i>
            </a>
        </div>
    </div>
</section>
