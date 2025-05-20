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

git clone https://your-repo-url.git
cd personal-task-goal-tracker


2. Build and start all containers (backend, frontend, MySQL):

docker-compose up --build

3. The backend Laravel API will be available at:  
`http://localhost:8000`

4. The React frontend will be available at:  
`http://localhost:3000`

5. MySQL database runs inside Docker on port 3307 (adjust if needed)

6. Access phpMyAdmin or your preferred DB client if configured, or connect directly using credentials from `.env`.

7. Run migrations (inside backend container):

docker-compose exec backend php artisan migrate


8. Register a user via the frontend and start managing your tasks and goals!

## Design Patterns and SOLID Principles

- The backend follows SOLID principles to maintain clean and maintainable code.
- Used Repository Pattern to abstract database interactions from business logic.
- Separation of concerns is ensured between frontend and backend for modularity.

## Environment Variables

- Backend uses `.env` file to store sensitive info like database credentials and app keys.
- Example:

DB_HOST=mysql
DB_PORT=3307
DB_DATABASE=personal_tracker
DB_USERNAME=user
DB_PASSWORD=password



## Author

- Sanjula Athauda — [sanjulathyagi@gmail.com]

---

Thank you for reviewing my Personal Task & Goal Tracker application!
