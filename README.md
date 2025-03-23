# 🎯 BSCGen - Balanced Scorecard Management System

BSCGen is a web-based Balanced Scorecard management tool built with **Laravel 12 + Breeze + Tailwind CSS**. It allows organizations to define, assign, and evaluate strategic objectives, KPIs, and performance metrics for employees.

---

## 🚀 Features

- ✅ User authentication (via Laravel Breeze)
- ✅ Employee management with self-referencing supervisors
- ✅ Balanced Scorecard builder per employee per year
- ✅ Dynamic KPI assignment based on perspectives & objectives
- ✅ Organizational chart visualization using Treant.js
- ✅ Export Scorecards to PDF and Excel
- ✅ Responsive design with Tailwind CSS
- ✅ Clean and intuitive UI

---

## 📦 Tech Stack

- **Laravel 12**
- **Tailwind CSS**
- **Laravel Breeze (Authentication)**
- **Treant.js** (Org Chart)
- **barryvdh/laravel-dompdf** (PDF Export)
- **maatwebsite/excel** (Excel Export)

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/yourusername/bscgen.git
cd bscgen

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install && npm run build

# Create environment file
cp .env.example .env

# Set your DB credentials in .env
php artisan key:generate

# Migrate database and seed default data
php artisan migrate --seed

# Start local server
php artisan serve