# Personal Task & Goal Tracker

## Problem Statement
Many individuals struggle to stay organized and productive when managing multiple tasks and personal goals. This application helps users create, manage, and monitor their tasks and goals efficiently within a simple, user-friendly interface.

## Features
- User authentication (sign-up/login) using Laravel Sanctum
- Create, update, and delete Tasks
- Create, update, and delete Goals
- Associate Tasks with specific Goals
- Mark Tasks as complete
- Dashboard to view active Goals, pending and completed Tasks, and progress toward Goals


## Tech Stack
- **Backend:** Laravel (PHP), following SOLID principles and Repository design pattern
- **Frontend:** React.js with Tailwind CSS for UI styling
- **Database:** MySQL (running inside Docker)
- **Containerization:** Docker for backend, frontend, and database
- **Authentication:** Laravel Sanctum for API token authentication
- **Chart Generation:** recharts 
- **JS-Cookie:** For easy to set, get and remove cookies
- **Other:** Environment variables for configuration

## Project Structure
assessment/
│
├── personal-tracker-backend/ # Laravel backend API
│ ├── app/
│ ├── config/
│ ├── database/
│ └── ...
│
├── personal-tracker-frontend/ # React frontend app
│ ├── src/
│ ├── public/
│ └── ...
│
├── docker-compose.yml # Docker configuration for backend, frontend, and MySQL
├── README.md
└── ...


## Setup Instructions

### Prerequisites
- Docker & Docker Compose installed on your machine
- Node.js and npm installed (for local frontend dev, optional if using Docker)

### Steps

1. Clone the repository:

- git clone https://github.com/sanjulathyagi/personal_task_tracker.git

  cd assessment


2. Copy .env file and generate app key:
    
    cp personal-tracker-backend/.env.example personal-tracker-backend/.env

    docker-compose exec backend php artisan key:generate


3. Build and start all containers (backend, frontend, MySQL):

    docker-compose up --build

4. URLs: 

    Backend API: http://localhost:8000
    Frontend React App: http://localhost:3000 (or port 3001 if 3000 is in use)

5. MySQL Database

    Runs in Docker on internal port 3306

    If accessing externally (e.g. via phpMyAdmin), use mapped port 3307

    Default credentials (based on .env and docker-compose.yml):

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=personal_tracker
    DB_USERNAME=root
    DB_PASSWORD=


6. Run database migrations (inside backend container):
 
    docker-compose exec backend php artisan migrate

7. Sanctum Configuration

    SANCTUM_STATEFUL_DOMAINS=localhost:3000,localhost:3001
    SESSION_DOMAIN=localhost

- Ensure config/sanctum.php has:

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', 'localhost:3000')),


## Design Patterns and SOLID Principles

- Backend code follows SOLID principles for clean, maintainable structure

- Implements the Repository Pattern to abstract database queries

- Clear separation between business logic and data access

- Modular structure with RESTful API principles

## Environment Variables

- Backend uses `.env` file to store sensitive info like database credentials and app keys.
- Example:

    APP_NAME=PersonalTaskTracker
    APP_URL=http://localhost:8000

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=personal_tracker
    DB_USERNAME=user
    DB_PASSWORD=password


    SESSION_DRIVER=file
    SESSION_DOMAIN=.localhost
    SESSION_SECURE_COOKIE=false
    SESSION_SAME_SITE=lax
    SESSION_LIFETIME=120
    SANCTUM_STATEFUL_DOMAINS=localhost:3000,localhost:3001

## Problems You're Solving
-  User Authentication & Session Management
         Maintain authenticated sessions via cookies between the React frontend and Laravel backend
- Frontend-Backend Separation
        Communicate using secure HTTP API requests
- CSRF & Cookie-based Auth Handling
        Set up session configuration (SESSION_DOMAIN, SESSION_SECURE_COOKIE, etc.) correctly for cross-origin requests.
- Local Development with Docker

## Author

- Sanjula Athauda — [sanjulathyagi@gmail.com]

---

Thank you for reviewing my Personal Task & Goal Tracker application!
