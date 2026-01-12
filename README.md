# MVC Notes App

A simple Notes application built from scratch using **Pure PHP** following the **MVC (Model–View–Controller)** architecture.

This project was created as a **learning-focused backend project** to deeply understand how MVC frameworks (like Laravel) work internally, without relying on any framework.

---

## Features

- User Authentication (Register / Login / Logout)
- Session-based authentication
- Each user can:
  - Create notes
  - Edit their own notes
  - Delete their own notes
  - View only their notes
- Authorization checks using Middleware
- Server-side validation
- Flash messages for success & error feedback
- Clean MVC structure
- Custom Router with dynamic URL parameters
- Custom Middleware system

---

## Project Structure

app/
├── controllers/
│ ├── AuthController.php
│ └── NoteController.php
│
├── core/
│ ├── Router.php
│ ├── Session.php
│ ├── Validator.php
│ ├── Auth.php
│ ├── AuthService.php
│ ├── BaseController.php
│ ├── BaseModel.php
│ └── Middleware/
│ ├── AuthMiddleware.php
│ ├── OwnsNoteMiddleware.php
│ └── MiddlewareInterface.php
│
├── models/
│ ├── User.php
│ └── Note.php
│
├── views/
│ ├── layouts/
│ │ └── main.php
│ │
│ ├── partials/
│ │ └── navbar.php
│ │
│ ├── auth/
│ │ ├── login.php
│ │ └── register.php
│ │
│ └── notes/
│ ├── index.php
│ ├── create.php
│ ├── edit.php
│ └── show.php
│
├── config/
│ └── database.php
│
public/
├── index.php
│
vendor/

---

## Security Considerations

- Passwords are hashed using `password_hash()`
- SQL Injection protection via **PDO prepared statements**
- Authorization middleware prevents users from accessing others’ notes
- Session-based authentication
- Input validation on all user inputs
- Database credentials are intended for local development only

---

## Installation & Setup

### Clone the repository

```bash

git clone https://github.com/KareemEzzat77/mvc-notes-app.git

```

---

### Database Setup

Create a MySQL database (e.g. `notes_app`) and add the following tables:

```sql

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) UNIQUE,
email VARCHAR(255) UNIQUE,
password VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notes (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
title VARCHAR(255),
body TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

```

### Running the project

- Place the project inside your local server directory (e.g. XAMPP htdocs)
- Configure database credentials in app/config/database.php
- Start Apache & MySQL
- Visit: http://localhost/mvc-notes-app/public

## Author

Kareem Ezzat
Computer Science Graduate – Backend Developer
