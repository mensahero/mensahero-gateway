
# 📡 Mensahero — SMS Gateway & Messaging Platform

Mensahero (from the Filipino/Waray word for “messenger”) is a modern SMS gateway and message delivery platform that helps businesses send and receive messages reliably. Built on Laravel with a Vue 3 frontend, Mensahero provides developer-friendly APIs, real-time dashboards, and production-ready tooling to get you from prototype to scale.


## 🎯 What is Mensahero?
Mensahero centralizes outbound and inbound SMS, queues deliveries for reliability, and offers tools to monitor delivery status, retries, and message logs. It’s ideal for OTPs, notifications, alerts, and transactional messaging.

## 🖼️ Branding
- Name: Mensahero — “messenger” in Filipino/Waray
- Colors:
  - Warm Filipino Deep Red: `#D72638`
  - Warm Filipino Golden Yellow: `#FFBE0B`
- Typography:
  - Headings: Poppins
  - Body: Nunito

These are applied across the UI (see `resources/css/app.css` and Vue components) and assets like `public/favicon.svg`.

## 🛠️ Tech Stack

### Backend
- 🐘 PHP 8.4
- 🎨 Laravel 12
- ⚡ Inertia.js (SPA without a separate API layer)

### Frontend
- 🖼️ Vue 3
- 🎯 TailwindCSS 4
- 📦 TypeScript
- ⚡ Vite
- 🧩 Nuxt UI component primitives integrated for consistency

### Development & Quality
- 🧪 Pest PHP (backend tests)
- 🎭 Playwright (end-to-end tests)
- 🔍 PHPStan (static analysis)
- 🎨 Laravel Pint (code style)
- ♻️ Rector (automated refactors)
- 📋 ESLint + 💅 Prettier (frontend)
- 🐳 Laravel Sail (optional Docker dev)
- 📧 Mailpit (email testing)

## ✨ Key Features
- 🔐 Authentication (Laravel Fortify)
- 🔁 Token-based API auth with refresh and device/session management
- 📤 Outbound SMS sending with queued deliveries
- 📥 Inbound message handling (webhooks/provider callbacks)
- 🔄 Automatic retry on transient failures
- 📊 Message logs and status tracking (sent, delivered, failed)
- 🔔 Notifications and audit trails
- 🌗 Theme/appearance middleware and responsive design

> Note: Some features may require provider configuration and webhooks.

## 🚀 Getting Started

### Prerequisites
- PHP 8.4+
- Composer
- Node.js (LTS) & npm
- Git
- A database (SQLite/MySQL/PostgreSQL) — SQLite is fine for local

### Installation
1) Clone the repo
```bash
git clone https://github.com/your-org/mensahero-gateway.git
cd mensahero-gateway
```

2) Install dependencies
```bash
composer install
npm install
```

3) Configure environment
```bash
cp .env.example .env
php artisan key:generate
```
Update `.env` with your database and any SMS provider credentials (e.g., Twilio, Nexmo/Vonage, etc.).

4) Database setup
```bash
# Example for SQLite
type NUL > database\database.sqlite
php artisan migrate
```

5) Start development servers
```bash
composer dev
# or run separately
# php artisan serve
# npm run dev
```

### Available Scripts
- `composer dev` — Start API + Vite concurrently
- `composer dev:ssr` — Start with server‑side rendering
- `composer test` — Run backend tests
- `composer format` — Format frontend and backend code
- `composer analyse` — Static analysis
- `npm run dev` — Vite dev server
- `npm run build` — Production build
- `npm run lint` — Lint frontend

## 🔧 Configuration
Core environment variables to review in `.env`:
- `APP_NAME=Mensahero`
- `APP_URL=http://localhost`
- `APP_ENV=local`
- `APP_DEBUG=true`
- Database settings (`DB_CONNECTION`, `DB_DATABASE`, ...)
- Queue connection (`QUEUE_CONNECTION=database|redis`)
- Cache/session drivers
- SMS provider credentials and webhook URLs (set based on your chosen provider)

See `config/app.php` and `resources/js/pages/Welcome.vue` for app branding usage.

## 🧭 Project Highlights
- Blade shell: `resources/views/app.blade.php`
- Global styles and brand tokens: `resources/css/app.css`
- Vue entry pages/components: `resources/js/pages` and `resources/js/components`
- Icons/branding assets: `public/favicon.svg`, `public/apple-touch-icon.png`

## 🤝 Contributing
Pull requests are welcome! Please run formatters and linters before submitting:
```bash
composer format && npm run lint
```

## 📄 License
Mensahero is open‑sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
