# Attendance Checking App

## Description
The Attendance Checking App is a Laravel-based application designed to manage attendance records efficiently. It allows users to log attendance, generate QR codes for easy check-ins, and view attendance history.

## Technologies Used
- **PHP**: Version 8.2 or higher
- **Laravel**: Version 11.31
- **Laravel Tinker**: For interactive shell
- **Simple QR Code**: For generating QR codes
- **Laravel Breeze**: For authentication scaffolding
- **PHPUnit**: For testing

## Requirements
- PHP 8.2 or higher
- Composer
- Node.js and npm (for frontend assets)

## How to Clone
To clone the repository, run the following command in your terminal:

```bash
git clone https://github.com/Azurakun/attendance-checking-app.git
```

## How to Run
1. Navigate to the project directory:
   ```bash
   cd attendance-checking-app
   ```

2. Install the PHP dependencies:
   ```bash
   composer install
   ```

3. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run the database migrations:
   ```bash
   php artisan migrate
   ```

6. Install the frontend dependencies:
   ```bash
   npm install
   ```

7. Run the development server:
   ```bash
   php artisan serve
   ```

8. In a new terminal, run the following command to start the frontend:
   ```bash
   npm run dev
   ```

## License
This project is licensed under the MIT License.
# attendance-checking-app
