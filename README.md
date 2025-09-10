# E-commerce SPA (Laravel + Bootstrap)

A **Single Page Application (SPA)** E-commerce project built with **Laravel 10**, **Bootstrap 5**, and **JWT authentication**.  
Users can **register, login, browse items, filter products, add/remove from cart**, and view their cart.

---

## Features

- User registration & login with **JWT authentication**
- Browse items with filters (category, price)
- Add to cart, remove from cart, view cart
- Responsive and professional frontend using Bootstrap 5
- API ready for SPA frontend or mobile apps

---

## Technologies

- **Backend:** Laravel 10, PHP 8.2+
- **Frontend:** Bootstrap 5, Axios
- **Database:** MySQL
- **Authentication:** JWT (JSON Web Tokens)
- **Version Control:** Git, GitHub

---

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js & npm (optional for frontend build)
- Git

---

## Installation

Clone the repository:

```bash
git clone https://github.com/Surabhi195/ecommerce-app.git
cd ecommerce-app

Install backend dependencies:
composer install

(Optional) Install frontend dependencies if using npm:
npm install
npm run dev

### Setup Environment Variables

1. Copy the example `.env` file:
```bash
cp .env.example .env

### Update .env forlocal setup

APP_NAME=EcommerceApp
APP_ENV=local
APP_KEY=base64:GENERATE_THIS
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=GENERATE_THIS
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync

### Generate the application key:
php artisan key:generate

### Generate the JWT Secret:
php artisan jwt:secret


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
