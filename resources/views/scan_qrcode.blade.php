<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Scan QR Code for Attendance</h1>
    <form action="{{ route('qrcode.scan') }}" method="POST">
        @csrf
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        <br>
        <label for="class_id">Class ID:</label>
        <input type="text" id="class_id" name="class_id" required>
        <br>
        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
