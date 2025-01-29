<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Admin Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }
        h1, h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        input[type="text"] {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            color: #6c757d;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1, h2 {
                margin-bottom: 15px;
            }
            input[type="text"] {
                width: 90%;
            }
            .btn {
                padding: 8px 16px;
                margin: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Manage QR Codes</h2>
        <form method="POST" action="{{ route('qrcode.generate') }}">
            @csrf
            <input type="text" name="class_id" placeholder="Class ID" required>
            <input type="text" name="class_name" placeholder="Class Name" required>
            <button type="submit" class="btn btn-success">Generate QR Code</button>
        </form>
        <h2>QR Code History</h2>
        <a href="{{ route('qrcode.history') }}" class="btn btn-info">View Classes</a>

        <!-- Attendance History Button -->
        <div class="mt-4">
            <a href="{{ route('attendance.history') }}" class="btn btn-primary">
                {{ __('View Attendance History') }}
            </a>
        </div>

        <!-- Logout Button -->
        <div class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Attendance System</p>
    </footer>
</body>
</html>
