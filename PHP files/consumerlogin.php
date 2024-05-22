<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market - Login</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f3f3f3; /* Change background color */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Increased box shadow */
    width: 300px;
    text-align: center;
}

.container h1 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px; /* Increased font size */
}

input[type=text],
input[type=password] {
    width: calc(100% - 20px);
    padding: 12px; /* Increased padding */
    margin: 15px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type=password] {
    margin-top: 15px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 15px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px; /* Increased font size */
    transition: background-color 0.3s; /* Smooth hover transition */
}

input[type=submit]:hover {
    background-color: #45a049;
}

.register-link {
    margin-top: 20px;
    color: #333;
    text-decoration: none;
    font-size: 14px; /* Adjusted font size */
}

.register-link:hover {
    text-decoration: underline;
    color: #555; /* Darkened color on hover */
}
s
    </style>
</head>
<body>
    <div class="container">
        <h1>Farm2Market</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
        <a href="consumerregistration.php" class="register-link">Don't have an account? Register now.</a>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "harshe23673065";
    $dbname = "farm2market";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM consumers WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
        // Redirect to a new page or perform further actions upon successful login
    } else {
        echo "Login failed. Invalid username or password.";
    }

    $conn->close();
}
?>
