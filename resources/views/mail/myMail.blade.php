<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackCat Ticket</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .logo-container {
            text-align: center;
        }

        .logo {
            max-width: 100px;
            
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }
        .ticket {
            background-color: #3498db;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
            border-radius: 5px;
        }

        .ticket p {
            margin: 0;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ URL::to('assets/images/logo-icon.png') }}" alt="" class="logo">
        </div>
        <h2> YOUR TICKETS</h2>
        <h1>Hi, {{ $data['username'] }}</h1>
        <p>Thank you for your order. This is your ticket's infomation:</p>
        <div class="ticket">
            <p><strong>Movie:</strong> {{ $data['movie_name'] }}</p>
            <p><strong>date:</strong> {{ $data['show_date'] }}</p>
            <p><strong>Cinema:</strong> {{ $data['cinema_name'] }}</p>
            <p><strong>Theater :</strong> {{ $data['theater_name'] }}</p>
            <p><strong>Time:</strong> {{ $data['start_time'] }}</p>
            <p><strong>Seats:</strong> {{ $data['selected_seats'] }}</p>
        </div>
        {{-- @php
            $qrData = [
                'movie_name' => $data['movie_name'],
                'show_date' => $data['show_date'],
                'cinema_name' => $data['cinema_name'],
                'theater_name' => $data['theater_name'],
                'start_time' => $data['start_time'],
                'selected_seats' => $data['selected_seats'],
            ];
        @endphp

        <div class="qr-code">
            <img src="data:image/png;base64, {!! base64_encode(
                QrCode::format('png')->size(100)->generate(json_encode($qrData)),
            ) !!} ">
        </div> --}}
        <p>Please go to the correct Cinema and theater as described and present your ticket by mail!!</p>
        <p>Enjoy!</p>
    </div>
</body>

</html>
