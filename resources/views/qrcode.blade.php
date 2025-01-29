<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Generate QR Code for Class</h1>
    <form action="{{ route('qrcode.generate') }}" method="POST">
        @csrf
        <label for="class_id">Class ID:</label>
        <input type="text" id="class_id" name="class_id" required>
        <br>
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" required>
        <br>
        <button type="submit">Generate QR Code</button>
    </form>

    @if(isset($qrCode))
        <h2>Your QR Code:</h2>
        <div>{!! $qrCode !!}</div>
    @endif
</body>
</html>
