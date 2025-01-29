<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Attendance History</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance History</h1>

        <!-- Form for creating new attendance record -->
        <form action="{{ route('attendance.create') }}" method="POST">
            @csrf
            <input type="text" name="student_id" placeholder="Student ID" required>
            <input type="text" name="class_id" placeholder="Class ID" required>
            <button type="submit">Add Attendance</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Timestamp</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendanceRecords as $record)
                    <tr>
                        <td>{{ $record->student_name }}</td>
                        <td>{{ $record->class_name }}</td>
                        <td>{{ $record->timestamp }}</td>
                        <td>
                            <form action="{{ route('attendance.delete', $record->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            {{-- <a href="{{ route('attendance.update', $record->id) }}">Edit</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Attendance System</p>
    </footer>
</body>
</html>
