require('dotenv').config();
const express    = require('express');
const exphbs     = require('express-handlebars');
const multer     = require('multer');
const path       = require('path');
const fs         = require('fs');

const app  = express();
const PORT = process.env.PORT || 3000;

/* ── View engine : Handlebars ── */
app.engine('hbs', exphbs.engine({
  extname: '.hbs',
  defaultLayout: 'main',
  layoutsDir:  path.join(__dirname, 'views/layouts'),
  partialsDir: path.join(__dirname, 'views/sections'),
  helpers: {
    currentYear: () => new Date().getFullYear(),
  }
}));
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, 'views'));

/* ── Static files ── */
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

/* ── Multer : upload photo de profil ── */
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const dir = path.join(__dirname, 'public/images');
    if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
    cb(null, dir);
  },
  filename: (req, file, cb) => {
    // Supprimer les anciennes photos
    ['jpg','png','webp'].forEach(ext => {
      const old = path.join(__dirname, `public/images/profile.${ext}`);
      if (fs.existsSync(old)) fs.unlinkSync(old);
    });
    const ext = path.extname(file.originalname).toLowerCase().replace('.jpeg','.jpg');
    cb(null, `profile${ext}`);
  }
});
const upload = multer({
  storage,
  limits: { fileSize: 3 * 1024 * 1024 },
  fileFilter: (req, file, cb) => {
    const allowed = ['image/jpeg','image/png','image/webp'];
    allowed.includes(file.mimetype) ? cb(null, true) : cb(new Error('Format non supporté'));
  }
});

/* ── Helpers : détecter si photo existe ── */
function getProfilePhoto() {
  for (const ext of ['jpg','jpeg','png','webp']) {
    const p = path.join(__dirname, `public/images/profile.${ext}`);
    if (fs.existsSync(p)) return `/images/profile.${ext}?v=${fs.statSync(p).mtimeMs}`;
  }
  return null;
}

/* ════════════════════════════════
   ROUTES
════════════════════════════════ */

/* Page principale */
app.get('/', (req, res) => {
  res.render('home', {
    title: 'LANKOANDE — Développeur Full-Stack',
    profilePhoto: getProfilePhoto(),
    success: req.query.success,
    avatarSuccess: req.query.avatar,
    error: req.query.error,
  });
});

/* Upload photo de profil */
app.post('/profile/photo', (req, res) => {
  upload.single('photo')(req, res, (err) => {
    if (err) {
      return res.redirect('/?error=' + encodeURIComponent(err.message));
    }
    if (!req.file) {
      return res.redirect('/?error=Aucun fichier reçu');
    }
    res.redirect('/?avatar=Photo+mise+à+jour+avec+succès#about');
  });
});

/* Formulaire de contact */
app.post('/contact', async (req, res) => {
  const { name, email, subject, message } = req.body;

  if (!name || !email || !message) {
    return res.redirect('/?error=Champs+obligatoires+manquants#contact');
  }

  // Log en dev — décommenter nodemailer pour la prod
  console.log('📧 Contact:', { name, email, subject, message });

  /*
  // Pour activer l'envoi d'email, ajouter dans .env :
  // MAIL_USER=votre@gmail.com
  // MAIL_PASS=votre_app_password
  const nodemailer = require('nodemailer');
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: { user: process.env.MAIL_USER, pass: process.env.MAIL_PASS }
  });
  await transporter.sendMail({
    from: email,
    to: 's.lankoande786@gmail.com',
    subject: `Portfolio - ${subject || 'Nouveau message'}`,
    text: `De: ${name}\n\n${message}`
  });
  */

  res.redirect('/?success=Message+envoyé+avec+succès#contact');
});

/* ── Démarrage ── */
app.listen(PORT, () => {
  console.log(`✅ Portfolio lancé sur http://localhost:${PORT}`);
});