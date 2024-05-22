<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market - Registration and Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS styles specific to this page */
        body {
            background-color: #66cdaa; /* Cyan background color for the entire page */
        }
        .form-container {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .form-container label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            text-align: left; /* Align labels to the left */
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            text-align: left; /* Align input/select fields to the left */
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Farm2Market - Registration</h1>
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
            $mobile_number = $_POST['mobile'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $type_of_seller = $_POST['seller-type'];
            $radius = $_POST['delivery-radius'];

            // Insert data into database
            $sql = "INSERT INTO farmerregister (name, mobile_number, address, password, type_of_seller, radius) VALUES ('$name', '$mobile_number', '$address', '$password', '$type_of_seller', '$radius')";

            if ($conn->query($sql) === TRUE) {
        	echo "<script>alert('Registration successful!'); window.location.href = 'mainframe.php';</script>";
        	exit(); 
    	    } else {
        	echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    	    }

            // Close connection
            $conn->close();
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="seller-type">Type of Seller:</label>
            <select id="seller-type" name="seller-type">
                <option value="vegetable-vendor">Vegetable Vendor</option>
                <option value="fruit-vendor">Fruit Vendor</option>
                <option value="rice-vendor">Rice Vendor</option>
            </select>

            <label for="delivery-radius">Delivery Radius (in miles):</label>
            <input type="number" id="delivery-radius" name="delivery-radius" required>

            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="login.html">Log In</a></p>
    </div>
</body>
</html>