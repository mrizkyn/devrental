# DEVRENTAL - Car Rental Management System

## 📋 Table of Contents

-   [Overview](#overview)
-   [Features](#-features)
-   [Tech Stack](#-tech-stack)
-   [Installation](#-installation)
-   [Usage](#-usage)
-   [Project Structure](#-project-structure)
-   [API Endpoints](#-api-endpoints)
-   [Database Schema](#-database-schema)
-   [Screenshots](#-screenshots)
-   [Contributing](#-contributing)
-   [License](#-license)

## 📖 Overview

DEVRENTAL is a comprehensive web-based car rental management system built with Laravel, designed to streamline vehicle rental operations in Bandung, Indonesia. The platform provides separate interfaces for administrators and customers, featuring role-based access control, transaction management, and a seamless rental process.

**Tagline**: _"Dedkar Mobil - Tersedia jenis mobil baik transmisi manual maupun matic sesuai dengan kebutuhan"_

## ✨ Features

### 👑 **Admin Dashboard**

-   ✅ **User Management** - Create, edit, and delete user accounts
-   🔒 **Role-Based Access Control** - Spatie Permission integration with Admin/Customer roles
-   🚗 **Car Management** - Add, edit, and remove vehicles from inventory
-   💰 **Transaction Monitoring** - View and manage all rental transactions
-   📊 **Return Processing** - Validate vehicle returns with image verification
-   📈 **Dashboard Analytics** - Overview of rental operations and statistics

### 👤 **Customer Portal**

-   🔍 **Car Browsing** - View available vehicles with detailed specifications
-   🛒 **Multi-Step Booking** - 3-step rental process (Info → Details → Payment)
-   📋 **Rental History** - Track past and current rentals
-   💳 **Payment Processing** - Secure payment submission with image upload
-   📷 **Return Submission** - Submit return requests with photo evidence
-   🔄 **Real-time Status** - Monitor rental status updates

### 🚗 **Car Features**

-   🖼️ **Vehicle Catalog** - Display cars with images, prices, and specifications
-   ⚙️ **Transmission Filter** - Manual and automatic transmission options
-   📄 **Detailed Pages** - Comprehensive vehicle information pages
-   ✅ **Availability Management** - Real-time booking system

## 🛠️ Tech Stack

### Backend

-   **PHP 8.2+** - Server-side programming language
-   **Laravel 9.x** - PHP web application framework
-   **MySQL 5.7+** - Relational database management
-   **Spatie Laravel-Permission** - Role and permission management
-   **Bootstrap 4.5** - Frontend framework
-   **jQuery 3.5** - JavaScript library
-   **DataTables 1.11** - Advanced table interactions
-   **Composer** - PHP dependency manager

### Frontend

-   **HTML5 & CSS3** - Markup and styling
-   **JavaScript (ES6+)** - Client-side scripting
-   **Bootstrap 4.5** - Responsive design framework
-   **Font Awesome 6** - Icon toolkit
-   **jQuery DataTables** - Enhanced table functionality
-   **AJAX** - Asynchronous data loading

## 🚀 Installation

### Prerequisites

Ensure you have the following installed:

-   PHP 8.2 or higher
-   Composer
-   MySQL 5.7 or higher
-   Git
-   Web server (Apache/Nginx) or PHP built-in server

### Step-by-Step Setup

1. **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/devrental.git
    cd devrental
    Install PHP Dependencies
    ```

bash
composer install
Configure Environment

bash
cp .env.example .env
php artisan key:generate
Update Environment Variables
Edit .env file with your database credentials:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devrental
DB_USERNAME=root
DB_PASSWORD=yourpassword
Run Database Migrations

bash
php artisan migrate --seed
Create Storage Link

bash
php artisan storage:link
Set Permissions

bash
chmod -R 775 storage bootstrap/cache
Start Development Server

bash
php artisan serve
Access the Application

Open browser and navigate to: http://localhost:8000

Default Admin Login: admin@devrental.com / password

Default Customer Login: customer@example.com / password

📱 Usage
For Administrators
Login with admin credentials

Dashboard: View system overview

User Management: Manage users and permissions

Car Management: Add/edit vehicles

Transactions: Monitor rental activities

Returns: Validate vehicle returns

For Customers
Register/Login to the platform

Browse Cars: View available vehicles

Rental Process:

Step 1: Personal Information

Step 2: Rental Details (Dates, Duration)

Step 3: Payment Upload

Track Rental: Monitor status updates

Return Vehicle: Submit return form with photos

📁 Project Structure
text
devrental/
├── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── CarController.php
│ │ │ ├── CustomerController.php
│ │ │ ├── RoleController.php
│ │ │ ├── TransactionController.php
│ │ │ └── UserController.php
│ │ └── Middleware/
│ ├── Models/
│ │ ├── User.php
│ │ ├── Role.php
│ │ ├── Car.php
│ │ └── Transaction.php
│ └── Providers/
├── database/
│ ├── migrations/
│ │ ├── 2014_10_12_000000_create_users_table.php
│ │ ├── 2014_10_12_100000_create_password_resets_table.php
│ │ ├── 2024_01_01_000001_create_roles_table.php
│ │ ├── 2024_01_01_000002_create_cars_table.php
│ │ └── 2024_01_01_000003_create_transactions_table.php
│ └── seeders/
│ ├── DatabaseSeeder.php
│ ├── RolesTableSeeder.php
│ └── UsersTableSeeder.php
├── resources/
│ ├── views/
│ │ ├── admin/
│ │ │ ├── cars/
│ │ │ ├── roles/
│ │ │ └── transactions/
│ │ ├── customer/
│ │ │ ├── cars/
│ │ │ ├── history/
│ │ │ └── transactions/
│ │ ├── landingpage/
│ │ │ ├── index.blade.php
│ │ │ └── cars/
│ │ └── layouts/
│ └── lang/
├── public/
│ ├── index.php
│ └── storage/ -> storage/app/public
├── routes/
│ └── web.php
├── storage/
│ ├── app/
│ │ └── public/ (Uploaded files)
│ └── logs/
├── tests/
├── vendor/
├── .env
├── .env.example
├── composer.json
└── README.md
🌐 API Endpoints
Public Routes
php
GET / # Landing page
GET /listcar # Car listing page
POST /login # User authentication
POST /register # User registration
Admin Routes (Middleware: auth, role:Admin)
php
GET /admin/dashboard # Admin dashboard
GET /cars # Car management
POST /cars # Create new car
PUT /cars/{id} # Update car
DELETE /cars/{id} # Delete car
GET /transactions # View all transactions
GET /return # View returns
PATCH /transactions/{id}/update-status # Update transaction status
PATCH /return/{id}/update-return # Update return status
Customer Routes (Middleware: auth, role:Customer)
php
GET /customer/index # Customer dashboard
GET /customer/cars # Browse cars
GET /customer/history # Rental history
GET /customer/cars/{car} # Car details
GET /form/step1/{car_id} # Step 1: Personal info
POST /form/step1 # Submit step 1
GET /form/step2/{transaction_id} # Step 2: Rental details
POST /form/step2 # Submit step 2
GET /payment/{transaction_id} # Payment page
POST /payment # Submit payment
GET /confirmation/{transaction_id} # Confirmation page
GET /return-form/{transaction_id} # Return form
POST /return-form # Submit return
🗄️ Database Schema
Users Table
sql
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) UNIQUE NOT NULL,
email_verified_at TIMESTAMP NULL,
password VARCHAR(255) NOT NULL,
remember_token VARCHAR(100) NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Roles & Permissions (Spatie)
sql
CREATE TABLE roles (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) UNIQUE NOT NULL,
guard_name VARCHAR(255) NOT NULL DEFAULT 'web',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE permissions (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) UNIQUE NOT NULL,
guard_name VARCHAR(255) NOT NULL DEFAULT 'web',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Cars Table
sql
CREATE TABLE cars (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
img VARCHAR(255) NOT NULL,
price DECIMAL(10,2) NOT NULL,
transmission ENUM('manual', 'automatic') DEFAULT 'manual',
description TEXT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
Transactions Table
sql
CREATE TABLE transactions (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
car_id INT NOT NULL,
name VARCHAR(255) NOT NULL,
telp VARCHAR(20) NOT NULL,
email VARCHAR(255) NOT NULL,
ktp VARCHAR(255) NOT NULL,
start DATETIME NOT NULL,
end DATETIME NOT NULL,
price DECIMAL(10,2) NOT NULL,
address TEXT NOT NULL,
img VARCHAR(255) NULL, -- Payment proof
back_img VARCHAR(255) NULL, -- Return proof
status ENUM('pending', 'complete', 'gagal') DEFAULT 'pending',
backs ENUM('Belum Dikembalikan', 'Sudah Dikembalikan', 'Gagal') DEFAULT 'Belum Dikembalikan',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
);
📸 Screenshots
(Add your screenshots here with descriptions)

Landing Page - Homepage with featured cars and services

Admin Dashboard - Overview of system statistics

Car Management - Add/edit vehicles interface

Transaction List - All rental transactions table

Customer Portal - User dashboard with rental options

Booking Process - Multi-step rental form

Payment Upload - Payment confirmation page

Return Validation - Admin return approval interface

🤝 Contributing
We welcome contributions! Please follow these steps:

Fork the repository

Create a feature branch (git checkout -b feature/AmazingFeature)

Commit your changes (git commit -m 'Add some AmazingFeature')

Push to the branch (git push origin feature/AmazingFeature)

Open a Pull Request

Development Guidelines
Follow PSR-12 coding standards

Write meaningful commit messages

Add comments for complex logic

Update documentation as needed

Test your changes thoroughly

📄 License
This project is proprietary software. All rights reserved.

Copyright © 2024 DEVRENTAL

🙏 Acknowledgments
Laravel Community - For the excellent PHP framework

Spatie - For the Laravel Permission package

Bootstrap Team - For the responsive CSS framework

DataTables - For enhanced table functionality

All Contributors - Who have helped shape this project
