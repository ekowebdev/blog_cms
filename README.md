# 📰 Blog CMS – Headless CMS with TALL Stack

Blog CMS is a Headless Content Management System built with **Laravel** and the **TALL Stack** (Tailwind CSS, Alpine.js, Laravel, Livewire). It allows admins to manage content (posts, pages, categories, and media) and exposes a public RESTful API for frontend.

---

## ⚙️ Tech Stack

- **Laravel 12** – Modern PHP framework for backend
- **Livewire** – Reactive components without writing JavaScript
- **Alpine.js** – Lightweight frontend interactivity
- **Tailwind CSS** – Utility-first CSS framework
- **Laravel Sanctum** – API token-based authentication
- **Spatie Laravel Permission** – Role-based access control (RBAC)
- **Laravel Localization** – Multi-language support
- **Laravel Scramble** – Automatic API documentation
- **Trix Editor** – WYSIWYG content editor

---

## ✨ Features

- 🔐 Admin login with role-based access control (RBAC)
- 🌐 Multi-language support for content and UI
- 📝 Rich-text content editing using Trix WYSIWYG editor
- 📂 Content management:
  - Posts (with image upload & publishing status)
  - Static pages
  - Categories (many-to-many relation with posts)
  - Basic media manager
- 📡 Public REST API for frontend consumption
- 📊 Admin dashboard with Livewire (real-time interaction)
- 📚 Auto-generated API documentation using Scramble

---

## 🚀 How to Run the Project

### 1. Clone the Repository
```bash
git clone https://github.com/ekowebdev/blog_cms.git
cd blog_cms
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve
php artisan queue:work
```

## 👤 Default Login Accounts

### There are two user roles created by default:

🔸Admin
- Email: admin@mail.com
- Password: 12345678
- Role: Admin
- Access: Full access to manage all content

🔸Viewer
- Email: eko@mail.com
- Password: 12345678
- Role: Viewer
- Access: Limited access (read-only or customized based on permission settings)

---

## 📚 API Documentation

### After starting the server, you can access the auto-generated API documentation via Scramble at:

```bash
http://localhost:8000/docs/api
http://localhost:8000/docs/api.json
