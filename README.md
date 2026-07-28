# Employee Management System

A modern web-based **Employee Management System** built with **Laravel 13** to manage employees, departments, users, and role-based access control. This project was developed as a portfolio project to demonstrate full-stack Laravel development skills.

---

## ✨ Features

- 🔐 Authentication (Login)
- 👥 User Management
- 🛡 Role & Permission Management (Spatie Laravel Permission)
- 👨‍💼 Employee CRUD
- 🏢 Department CRUD
- 🖼 Employee Photo Upload
- 👤 Employee Profile Page
- 📄 Export Employee Data to PDF
- 📊 Dashboard
- 📱 Responsive Interface

---

## 🛠 Tech Stack

### Backend
- Laravel 13
- PHP 8.3

### Frontend
- Blade
- Tailwind CSS
- Vite
- Alpine.js

### Database
- MySQL

### Packages
- Spatie Laravel Permission
- Barryvdh DomPDF

---

## 📂 Project Structure

```
employee-management
├── app
├── bootstrap
├── config
├── database
├── public
├── resources
├── routes
├── storage
├── tests
├── composer.json
└── README.md
```

---

## ⚙ Installation

Clone repository

```bash
git clone https://github.com/USERNAME/employee-management.git
```

Enter project directory

```bash
cd employee-management
```

Install dependencies

```bash
composer install
npm install
```

Copy environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure your database in the `.env` file, then run:

```bash
php artisan migrate --seed
```

Create storage link

```bash
php artisan storage:link
```

Run the application

```bash
php artisan serve
npm run dev
```

---

## 🔑 Demo Login

Administrator

Email

```
admin@example.com
```

Password

```
password
```

*(Replace with your actual admin credentials.)*

---

## 📷 Screenshots

### Login

> Add screenshot here

### Dashboard

> Add screenshot here

### Employee List

> Add screenshot here

### Employee Profile

> Add screenshot here

### Department Management

> Add screenshot here

### User Management

> Add screenshot here

### Export PDF

> Add screenshot here

---

## 🗄 Database Tables

- users
- roles
- permissions
- departments
- employees

---

## 👨‍💻 Author

**Ihsan Reihansyah**

GitHub:
https://github.com/USERNAME

LinkedIn:
https://linkedin.com/in/USERNAME

---

## 📄 License

This project is created for educational and portfolio purposes.