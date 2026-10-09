# Tasks for Today Management System - TSA2

A CodeIgniter 4 task management app for IT0049 TSA2. The existing TSA1 pages remain public. Creating, editing, and archiving tasks requires login.

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL or MariaDB

## Setup

1. Keep your local `.env` file private. Do not upload it to GitHub or share it.
2. Install dependencies if needed:

   ```bash
   composer install
   ```

3. Configure the database settings in your local `.env` file (database name, username, and password).
4. Choose one database setup method:

   **Fresh database:** Create an empty database and import `rancey.sql` using phpMyAdmin. This SQL export already includes the `users.password` and `tasks.is_archived` columns, so do not run the migration afterward.

   **Existing TSA1 database:** Back up the database first, then run:

   ```bash
   php spark migrate
   ```

5. Set the demo login password hash:

   ```bash
   php spark db:seed Tsa2DemoSeeder
   ```

6. Start the app:

   ```bash
   php spark serve
   ```

7. Open `http://localhost:8080`.

## Demo login

- Username: `admin01`
- Password: `Password123!`

This is a classroom demo password. Change it before deploying the app to a public host. The database stores a password hash, not the plaintext password. The seeder sets this demo password for `admin01`; other existing sample accounts do not have passwords until one is set for them.

## Features

- Public Welcome, Task List, Profile, and About pages
- Login and logout with CodeIgniter sessions and `password_verify()`
- Auth filter for task creation, editing, updating, and archiving
- Validation for task title, task date, and status
- Soft delete using `tasks.is_archived`; archived tasks are hidden on public task pages
- Migration for an existing TSA1 database and seeder for the demo account

## Task routes

- `/` - Today's tasks (public)
- `/tasks` - All active tasks (public)
- `/tasks/new` - Create task (login required)
- `/tasks/{id}/edit` - Edit task (login required)
- `/login` - Login
- Logout is submitted as a POST request.

## Testing checklist

1. While logged out, open `/tasks/new` directly. It should redirect to `/login`.
2. Log in with the demo credentials.
3. Create a task with a title and date, then edit it.
4. Archive the task and confirm it disappears from `/tasks` and from today's task list when relevant.
5. Log out and confirm task-management routes require login again.
