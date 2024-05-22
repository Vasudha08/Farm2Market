<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Farm2Market Registration</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection parameters
            $host = "localhost"; // Change this if your MySQL server is hosted elsewhere
            $username = "root"; // Your MySQL username
            $password = "harshe23673065"; // Your MySQL password
            $database = "farm2market"; // Your MySQL database name

            // Create connection
            $conn = new mysqli($host, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare data for insertion
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $contact_number = $_POST['contact'];
            $address = $_POST['address'];

            // Insert data into database
            $sql = "INSERT INTO consumerregister (name, password, email, contact_number, address) VALUES ('$name', '$password', '$email', '$contact_number', '$address')";

	    if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful!');</script>";
            } else {
                 echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }

            // Close connection
            $conn->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required>
                <small>Format: 1234567890</small>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>

</html>