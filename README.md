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
git clone https://github.com/IhsanReihansyah/employee-management-system.git
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
admin@gmail.com
```

Password

```
admin123
```

---

## 📷 Screenshots

### Login

> <img width="1920" height="918" alt="image" src="https://github.com/user-attachments/assets/1e4b8ce3-03df-4355-a727-ad16b5fb6131" />


### Dashboard

> <img width="1920" height="914" alt="image" src="https://github.com/user-attachments/assets/d838b117-242d-45c0-9510-4ff397d097e6" />



### Employee List

> <img width="1919" height="916" alt="image" src="https://github.com/user-attachments/assets/ce64470f-5117-4840-b1e9-5e05b2248bfa" />


### Employee Profile

> <img width="1920" height="916" alt="image" src="https://github.com/user-attachments/assets/bfd55e1d-c2ca-4a3a-a819-ea68641534f6" />


### Department Management

> <img width="1920" height="912" alt="image" src="https://github.com/user-attachments/assets/4215d3e5-dafb-4835-bb58-a9a373c92203" />


### User Management

> <img width="1920" height="915" alt="image" src="https://github.com/user-attachments/assets/76c17d91-10e4-4d67-8348-82b38a369f09" />


### Export PDF

> <img width="791" height="605" alt="image" src="https://github.com/user-attachments/assets/d3ebf0a2-7a3a-470d-bd54-a86b01eb1cf7" />


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
https://github.com/IhsanReihansyah

LinkedIn:
https://linkedin.com/in/ihsanreihansyah/

---

## 📄 License

This project is created for educational and portfolio purposes.
