# Laravel 12 Jetstream Livewire Volt

**Laravel_12_Jetstream_Livewire_Volt** is a modern **Laravel 12** application integrating **Jetstream**, **Livewire**, and **Volt** to deliver a powerful, real-time, and reactive user experience — all without using any external JavaScript frameworks like Vue or React.

---

## 🚀 Features Overview

### 🔐 Authentication & User Management
- Built using **Laravel Jetstream** with full authentication support.
- Includes **email verification**, **password management**, and **two-factor authentication (2FA)**.
- Profile editing, password updates, and appearance settings managed via **Volt** pages.

---

### 🧱 Livewire + Volt Integration
- **Volt** provides a cleaner syntax for Livewire page components.
- **Livewire** ensures instant, reactive updates without reloading pages.
- All CRUD operations, search, and filtering happen dynamically on the same page.

---

### 📝 Post Management (CRUD + Pagination + Search + Filter)
A fully functional **Post Management Module** built using **Livewire** components:

- ➕ **Create**, ✏️ **Edit**, 👁️ **View**, and 🗑️ **Delete** posts.
- 🔍 **Real-time search** by post title or author.
- 🧩 **Filter** posts dynamically (e.g., by user or date range).
- 📄 **Pagination** included for clean, organized listings.
- ✅ Full form validation and user-based access control.
- ⚙️ Backend powered by **Eloquent models**, **factories**, and **seeders** for demo data.

---

### 💡 Development Stack
| Technology | Purpose |
|-------------|----------|
| **Laravel 12** | Backend framework |
| **Jetstream** | Authentication, profile, and security |
| **Livewire** | Reactive UI and state management |
| **Volt** | Page-level Livewire components |
| **Vite + TailwindCSS** | Frontend build and styling |
| **SQLite/MySQL** | Database support |

---

## 🧰 Setup Instructions

```bash
# Clone the repository
git clone <repo-url>
cd laravel_12_jetstream_Livewire_volt

# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start development servers
php artisan serve
npm run dev
