# Particle Website (via Laravel)

Een Laravel-gebaseerde website voor Particle, een virtuele eSIM provider. Het project bevat een admin panel voor content management, gebruikersbeheer, FAQ systeem, en een publieke website.

## Vereisten

- PHP 8.2 of hoger
- Composer
- SQLite (of andere database naar keuze)
- [Laravel Herd](https://herd.laravel.com/) (optioneel maar aanbevolen)

## Installatie Instructies

### 1. Clone de repository
```bash
git clone <repository-url>
cd ParticleSite
```

### 2. Installeer dependencies
```bash
composer install
```

### 3. Configureer environment
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Run migrations en seeders
```bash
php artisan migrate:fresh --seed
```

Dit maakt de database aan met:
- Admin gebruiker: `admin@ehb.be` / `Password!321`
- Test gebruiker: `user@ehb.be` / `Password!321`
- Sample hero content
- Sample FAQ items

### 6. Start de development server

**Met Laravel Herd:**
- Herd detecteert automatisch Laravel projecten in je `~/Herd` folder
- Toegang via: `http://particlesite.test`

**Zonder Herd:**
```bash
php artisan serve
```
Toegang via: `http://localhost:8000`

### 7. Assets (optioneel)
Als je gebruik maakt van Vite voor frontend assets:
```bash
npm install
npm run dev
```

## Login Credentials

### Admin Account
- Email: `admin@ehb.be`
- Password: `Password!321`
- Toegang tot: `/admin`

### Test User Account
- Email: `user@ehb.be`
- Password: `Password!321`
- Toegang tot: `/dashboard`

## Functionaliteiten

### Publieke Features
- **Homepage** met dynamische hero sectie
- **FAQ pagina** (`/faq`) - Veelgestelde vragen
- **Plans pagina** - Abonnementen overzicht
- **Registratie & Login systeem**

### User Features
- **User Dashboard** - Persoonlijk dashboard voor ingelogde gebruikers
- **Account management**

### Admin Features (alleen voor admins)
- **User Management** (`/admin/users`)
  - Gebruikers overzicht
  - Nieuwe gebruikers aanmaken
  - Admin rechten toekennen/afnemen
  - Gebruikers verwijderen
  
- **Hero Management** (`/admin/modifyHero`)
  - Hero afbeelding aanpassen
  - Titel en beschrijving bewerken
  - Call-to-action button configureren
  - Live preview van wijzigingen
  
- **FAQ Management** (`/admin/faq`)
  - FAQ items toevoegen
  - Vragen en antwoorden bewerken
  - HTML support in antwoorden (voor links)
  - Volgorde bepalen

## Project Structuur

```
ParticleSite/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── FaqController.php
│   │   │   ├── HeroController.php
│   │   │   └── UserManagementController.php
│   │   └── Middleware/
│   └── Models/
│       ├── User.php
│       ├── Hero.php
│       └── Faq.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── admin/           # Admin panel views
│       ├── auth/            # Login & register
│       ├── faq/             # FAQ public page
│       ├── layouts/         # Layout templates
│       └── userConfig/      # User dashboard
├── routes/
│   └── web.php
└── public/
    └── Assets/              # Static assets (images, etc.)
```