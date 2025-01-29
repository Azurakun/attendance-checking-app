<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Attendance Failed</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
            color: #333;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: 600;
            color: #d32f2f; /* Red color for failure indication */
        }
        p {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #555; /* Darker gray for better readability */
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            background-color: #007bff;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 1.2em;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            p {
                font-size: 1em;
            }
            .btn {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance Submission Failed!</h1>
        <p>You will see this if you are trying to do the attendance twice, so that means you already done your Attendance!</p>
        <a href="{{ route('student.dashboard') }}" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
