# Laravel Todo App - Backend Trial Task

## Overview
This is a small Laravel web application for managing Todos. Users can:
- Add Todo with optional image
- View all Todos
- Edit Todo (title, status, image)
- Delete Todo
No authentication is required.

## Features
- Image upload and storage
- Edit todo including image
- Delete todo
- Status: pending/completed

## Approach
- Laravel MVC: Model (`Todo`), Controller (`TodoController`), Views (Blade)
- RESTful routes
- Validation for title, image, and status
- Images stored in `storage/app/public/todos`
- Old images deleted automatically when updating/deleting todo

## Setup Instructions
1. Clone the repo
2. Run `composer install`
3. Copy `.env.example` to `.env` and set your DB credentials
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan storage:link`
7. Run `php artisan serve`
8. Open `http://127.0.0.1:8000` in browser

## Screenshots
- Add Todo: ![Add](screenshots/image.png)

