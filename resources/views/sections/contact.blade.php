<section class="section" id="contact">
    <div class="container">
        <div class="section-header">
            <span class="section-num mono">05.</span>
            <h2 class="section-title">Contact</h2>
            <div class="section-line"></div>
        </div>

        <div class="contact-grid">
            <div class="contact-intro">
                <h3 class="contact-heading">Travaillons <span class="accent">ensemble.</span></h3>
                <p>
                    Vous avez un projet en tête ? Une idée à développer ?
                    Je suis disponible pour des missions freelance, des collaborations
                    ou simplement pour échanger sur la tech.
                </p>

                <div class="contact-info">
                    <a href="mailto:s.lankoande786@gmail.com" class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <span class="contact-label mono">Email</span>
                            <span class="contact-value">s.lankoande786@gmail.com</span>
                        </div>
                    </a>
                    <a href="https://github.com/Soumaila786/" class="contact-item">
                        <div class="contact-icon"><i class="fab fa-github"></i></div>
                        <div>
                            <span class="contact-label mono">GitHub</span>
                            <span class="contact-value">github.com/Soumaila786</span>
                        </div>
                    </a>
                    <a href="https://www.linkedin.com/in/soumaila-lankoande-797a24413/" class="contact-item">
                        <div class="contact-icon"><i class="fab fa-linkedin-in"></i></div>
                        <div>
                            <span class="contact-label mono">LinkedIn</span>
                            <span class="contact-value">linkedin.com/in/soumaila-lankoande</span>
                        </div>
                    </a>
                </div>
            </div>

            <form class="contact-form" action="/contact" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label mono" for="name">Nom complet</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label class="form-label mono" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label mono" for="subject">Sujet</label>
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="Projet freelance...">
                </div>
                <div class="form-group">
                    <label class="form-label mono" for="message">Message</label>
                    <textarea id="message" name="message" class="form-input form-textarea" placeholder="Dites-moi tout..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-full">
                    <span>Envoyer le message</span>
                    <i class="fas fa-paper-plane"></i>
                </button>

                @if(session('success'))
                <div class="form-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif
            </form>
        </div>
    </div>
</section>
