# Expense Tracker with Chart Visualization

A simple web application to track expenses and visualize them using charts. Built with Php(Laravel), Bootstrap 5, and Highcharts.

---

## Features

-  User Registration & Login
-  Dashboard with data table
-  Interactive Highcharts pie chart
-  Full CRUD on expenses (Create, Read, Update, Delete)
-  Data persistence via MySQL
-  Responsive design using Bootstrap 5

---

##  Tech Stack

- Backend Laravel (PHP)
- Frontend Blade Templates + Bootstrap 5
- Charts Highcharts JS
- Database MySQL



##  Installation (Local Setup)

```bash
git clone https://github.com/SAREMY-9/chart-app.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate

# Set your database credentials in .env

php artisan migrate
php artisan serve


## Folder Structure 

app/
├── Http/
│    Controllers/
│        ExpenseController.php
├── Models/
│        Expense.php
├── Database/
       /Migration
resources/
├── views/
│   ├── auth/ (Login & Register)
    ├── layout/ (bootstrap.blade.php)
│   └── dashboard.blade.php
routes/
└── web.php


## Chart Source

Highcahrts



###  Project Overview

The goal was to build a simple and clean web application that:
- Allows user authentication (login/register)
- Shows a table of data (expenses)
- Visualizes that data using a chart
- Enables full CRUD operations
- Persists data in a relational database

---

## Design & Development Decisions

- Laravel was chosen for its simplicity, security, and built-in authentication system.
- Blade templates and Bootstrap 5 made it easy to create a responsive, clean UI.
- Highcharts was used for its rich, interactive chart features with minimal setup.
- Expense model was selected because it's a relatable, real-world dataset to demonstrate CRUD and visualization.
- AJAX (optional enhancement) was considered for real-time chart/table updates after CRUD actions.



##  Authentication Flow

- Laravel Breeze (or Fortify/Jetstream) provides routes for registration and login.
- Once authenticated, the user is redirected to the main dashboard, where they can manage their expenses.


## Data Flow

- Expenses are stored in the database with fields like `name`,`category`, `amount`, and `date`.
- The table lists all entries with options to edit/delete.
- The chart pulls this data and visualizes it as a pie chart, grouped by category.



## Final Notes

- The solution is modular and scalable — you can switch the chart library, update the data type, or migrate to Vue.js.
- Security and validation have been considered (e.g., form validation, CSRF tokens).
- Code is clean and ready for production or further expansion.

