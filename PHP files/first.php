<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Farm2Market</title>
    <style>
        body {
            background-image: url('firstimage.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .frame {
            border: 2px solid #007bff; /* Blue border around the frame */
            border-radius: 10px; /* Rounded corners for the frame */
            padding: 20px; /* Padding inside the frame */
            background-color: white; /* White background color for the frame */
        }

        .container {
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .question {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="frame"> <!-- Add the frame around this part -->
            <h1>Welcome to Farm2Market</h1> <!-- Include the header within the frame -->
            <div class="question">How would you like to use this application?</div>
            <div class="btn-group">
                <button class="btn" onclick="window.location.href='login.php'">Farmer</button>
                <button class="btn" onclick="window.location.href='consumerlogin.php'">Consumer</button>
            </div>
        </div>
    </div>
</body>
</html>
