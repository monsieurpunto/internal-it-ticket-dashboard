# LeadGeeks Internal Ticketing Dashboard

A web-based internal IT ticket management system developed as part of the LeadGeeks technical assessment.

The application enables employees to submit IT support requests while providing administrators with a centralized dashboard to manage, prioritize, assign, and resolve support tickets through a modern web interface.

---

# Project Overview

The LeadGeeks Internal Ticketing Dashboard is designed to simplify internal IT support workflows.

Employees can create and monitor their own support requests, while administrators are able to oversee all submitted tickets, update their status, assign priorities, and manage supporting master data.

The application implements role-based authorization to ensure users only access features that are permitted for their assigned role.

---

# Technologies Used

## Backend

- PHP 8.4
- Laravel 13
- PostgreSQL

## Admin Panel

- Filament v5
- Filament Shield

## Authentication & Authorization

- Laravel Authentication
- Spatie Laravel Permission

## Frontend

- Blade
- Tailwind CSS
- Livewire

## Deployment

- Dokploy
- Nixpacks

---

# Features Implemented

## Authentication

- User Login
- User Logout
- Role-based access control

---

## User Features

- Create IT support tickets
- View own submitted tickets
- Edit open tickets
- Delete open tickets
- Track ticket status

---

## Administrator Features

- Dashboard overview
- Ticket management
- Status management
- Priority management
- Category management
- User management
- Role & Permission management (Filament Shield)

---

## Dashboard

- Total Tickets
- Open Tickets
- In Progress Tickets
- Resolved Tickets
- Closed Tickets
- High Priority Tickets

---

## Security

- Role-based authorization
- User ownership protection
- Permission management using Filament Shield

---

# Screenshots

> Replace the placeholders below with actual application screenshots.

---

## Login Page

![Login Page](docs/screenshots/login-page.png)

---

## Admin Dashboard

![Admin Dashboard](docs/screenshots/admin-dashboard.png)

---

## Ticket Management

![Ticket Management](docs/screenshots/ticket-management.png)

---

## Ticket Detail

![Ticket Detail](docs/screenshots/ticket-detail.png)

---

## User Dashboard

![User Dashboard](docs/screenshots/user-dashboard.png)

---

# Default Accounts

> Demo accounts used during development.

## Super Administrator

| Field | Value |
|-------|-------|
| Email | `superadmin@admin.com` |
| Password | `123456789` |

---

## User

| Field | Value |
|-------|-------|
| Email | `user@example.com` |
| Password | `********` |

> Replace the password placeholders if demo credentials are intended to be shared.

---

# Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
```

---

# License

This project was developed solely for the LeadGeeks technical assessment.

All source code remains the intellectual property of the author unless otherwise agreed.

---

# Author

**Your Name**

GitHub:
https://github.com/monsieurpunto
