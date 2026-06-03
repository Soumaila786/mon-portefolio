<section class="section" id="about">

    <div class="container">

        <div class="section-header">
            <span class="section-num mono">01.</span>
            <h2 class="section-title">À propos de moi</h2>
            <div class="section-line"></div>
        </div>

        <div class="about-grid">
            <div class="about-text">
                <p class="about-lead">
                    Développeur Full-Stack basé à <span class="accent">Ouagadougou, Burkina Faso</span> —
                    passionné par la création d'applications web qui allient performance, lisibilité et élégance.
                </p>
                <p>
                    Mon parcours m'a amené à concevoir des outils pour l'administration universitaire,
                    des systèmes de gestion de données complexes, et des interfaces utilisateurs intuitives.
                    Je crois que le bon code est à la fois fonctionnel et lisible.
                </p>
                <p>
                    Quand je ne code pas, j'explore les nouvelles technologies,
                    je contribue à des projets open-source, ou je résous des problèmes
                    algorithmiques pour garder l'esprit aiguisé.
                </p>

                <div class="about-highlights">
                    <div class="highlight-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Ouagadougou, Burkina Faso</span>
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:s.lankoande786@gmail.com">s.lankoande786@gmail.com</a>
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-code"></i>
                        <span>Disponible en freelance</span>
                    </div>
                </div>

                <a href="#" class="btn btn-outline">
                    <i class="fas fa-download"></i>
                    Télécharger mon CV
                </a>
            </div>

            <div class="about-visual">

                {{-- AVATAR — photo ou initiales --}}
                <div class="avatar-frame">
                    <div class="avatar-wrapper">

                        @if(file_exists(public_path('images/profile.jpeg')) ||
                            file_exists(public_path('images/profile.png'))  ||
                            file_exists(public_path('images/profile.webp')))

                            {{-- Photo réelle --}}
                            @php
                                $ext =  file_exists(public_path('images/profile.jpeg'))  ? 'jpeg'
                                        : (file_exists(public_path('images/profile.png')) ? 'png' : 'webp');
                            @endphp
                            <img
                                src="{{ asset('images/profile.'.$ext) }}?v={{ filemtime(public_path('images/profile.'.$ext)) }}"
                                alt="Photo de profil LANKOANDE"
                                class="avatar-photo"
                            >
                        @else
                            {{-- Fallback initiales --}}
                            <div class="avatar-initials-box">
                                <span class="avatar-initials">LNK</span>
                            </div>
                        @endif

                        <div class="avatar-ring"></div>
                        <div class="avatar-ring ring-2"></div>

                        {{-- Bouton upload (visible au hover) --}}
                        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="avatar-upload-form" id="avatar-form">
                            @csrf
                            <label class="avatar-upload-btn" title="Changer la photo">
                                <i class="fas fa-camera"></i>
                                <input
                                    type="file"
                                    name="photo"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="avatar-file-input"
                                    id="avatar-input"
                                >
                            </label>
                        </form>
                    </div>
                </div>

                @if(session('avatar_success'))
                <div class="avatar-toast">
                    <i class="fas fa-check-circle"></i> {{ session('avatar_success') }}
                </div>
                @endif

                @if($errors->has('photo'))
                <div class="avatar-toast avatar-toast-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first('photo') }}
                </div>
                @endif

                <div class="about-card">
                    <div class="about-card-row">
                        <span class="mono label">Focus</span>
                        <span>Web & API Development</span>
                    </div>
                    <div class="about-card-row">
                        <span class="mono label">Stack favori</span>
                        <span>Laravel + Vue.js</span>
                    </div>
                    <div class="about-card-row">
                        <span class="mono label">Langues</span>
                        <span>Français · Anglais</span>
                    </div>
                    <div class="about-card-row">
                        <span class="mono label"></span>
                        <span>Mooré · Gulmantché (Langues maternelle) </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Auto-submit dès qu'un fichier est sélectionné
document.getElementById('avatar-input')?.addEventListener('change', function() {
    if (this.files.length > 0) {
        const label = this.closest('label');
        label.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        document.getElementById('avatar-form').submit();
    }
});
</script>
