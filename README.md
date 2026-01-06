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

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/c36bd0d1-5e9f-4e0d-a42f-51b3ff5c0803" />

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/20d8072b-d6da-451a-b9ab-2e173e3bcfdd" />



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

1. composer install
2. Configure Environment
3. cp .env.example .env
4. php artisan key:generate
5. Update Environment Variables
6. Edit .env file with your database credentials
7.php artisan migrate --seed
8. Create Storage Link
9. php artisan storage:link
10. php artisan serve


Access the Application

1. Open browser and navigate to: http://localhost:8000
Default Admin Login: admin@gmail.com / 123123123

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
