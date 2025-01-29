<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>QR Code History</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: 600;
            color: #2c3e50;
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
            background-color: #6c757d;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 1.2em;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.2);
        }
        .btn:hover {
            background-color: #545b62;
            transform: translateY(-2px);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            .btn {
                padding: 10px 20px;
                font-size: 1em;
            }
            table {
                font-size: 0.9em;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>QR Code History</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn">Back to Admin Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Class ID</th>
                    <th>Class Name</th>
                    <th>QR Code</th>
                    <th>Generated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qrCodes as $qrCode)
                    <tr>
                        <td>{{ $qrCode->class_id }}</td>
                        <td>{{ $qrCode->class_name }}</td>
                        <td style="text-align: center;">
                            <div style="display: inline-block;">
                                {!! $qrCode->qr_code !!}
                            </div>
                        </td>
                        <td>{{ $qrCode->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
