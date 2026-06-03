<section class="section section-alt" id="skills">
    <div class="container">
        <div class="section-header">
            <span class="section-num mono">02.</span>
            <h2 class="section-title">Compétences</h2>
            <div class="section-line"></div>
        </div>

        <div class="skills-grid">

            {{-- Backend --}}
            <div class="skill-category">
                <div class="category-icon"><i class="fas fa-server"></i></div>
                <h3 class="category-title">Back-end</h3>
                <div class="skill-list">
                    @foreach([
                        ['name' => 'Laravel', 'level' => 85, 'icon' => 'fab fa-laravel'],
                        ['name' => 'PHP 8+', 'level' => 80, 'icon' => 'fab fa-php'],
                        ['name' => 'Python', 'level' => 65, 'icon' => 'fab fa-python'],
                        ['name' => 'REST API', 'level' => 80, 'icon' => 'fas fa-plug'],
                    ] as $skill)
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-icon"><i class="{{ $skill['icon'] }}"></i></span>
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-pct mono">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-fill" data-width="{{ $skill['level'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Frontend --}}
            <div class="skill-category">
                <div class="category-icon"><i class="fas fa-palette"></i></div>
                <h3 class="category-title">Front-end</h3>
                <div class="skill-list">
                    @foreach([
                        ['name' => 'Vue.js', 'level' => 70, 'icon' => 'fab fa-vuejs'],
                        ['name' => 'JavaScript', 'level' => 72, 'icon' => 'fab fa-js'],
                        ['name' => 'HTML / CSS', 'level' => 88, 'icon' => 'fab fa-html5'],
                        ['name' => 'Bootstrap 5', 'level' => 82, 'icon' => 'fab fa-bootstrap'],
                    ] as $skill)
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-icon"><i class="{{ $skill['icon'] }}"></i></span>
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-pct mono">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-fill" data-width="{{ $skill['level'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- DB & Tools --}}
            <div class="skill-category">
                <div class="category-icon"><i class="fas fa-database"></i></div>
                <h3 class="category-title">Base de données & Outils</h3>
                <div class="skill-list">
                    @foreach([
                        ['name' => 'MySQL', 'level' => 80, 'icon' => 'fas fa-database'],
                        ['name' => 'Git / GitHub', 'level' => 78, 'icon' => 'fab fa-git-alt'],
                        ['name' => 'Docker', 'level' => 55, 'icon' => 'fab fa-docker'],
                        ['name' => 'Linux', 'level' => 65, 'icon' => 'fab fa-linux'],
                    ] as $skill)
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-icon"><i class="{{ $skill['icon'] }}"></i></span>
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-pct mono">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-fill" data-width="{{ $skill['level'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Tech pills --}}
        <div class="tech-pills">
            @foreach(['Laravel','Vue.js','PHP','MySQL','Python','Git','Docker','Bootstrap','Tailwind','REST API','Linux','openpyxl'] as $tech)
            <span class="tech-pill mono">{{ $tech }}</span>
            @endforeach
        </div>

    </div>
</section>
