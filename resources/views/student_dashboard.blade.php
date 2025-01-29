<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Student Dashboard</title>
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
            max-width: 500px;
        }
        h1, h2 {
            margin-bottom: 20px;
            color: #2c3e50;
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
            .btn {
                padding: 8px 16px;
                margin: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Dashboard</h1>
        <h2>Mark Attendance</h2>
        <form method="POST" action="{{ route('attendance.mark') }}">
            @csrf
            <input type="hidden" name="class_id" value="{{ Auth::user()->class_id }}">
            <button type="submit" class="btn btn-success">Mark Attendance</button>
        </form>

        {{-- <h2>Attendance History</h2>
        <a href="{{ route('attendance.history') }}" class="btn btn-info">View Attendance History</a> --}}

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
