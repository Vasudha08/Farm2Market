<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market - Add Product</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.product-container {
    background-color: #fff;
    width: 80%;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.product-container h1 {
    margin-top: 0;
    font-size: 32px;
    color: #333;
    margin-bottom: 30px;
}

.form-container {
    text-align: left;
}

.form-container label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

.form-container input[type="text"],
.form-container input[type="number"],
.form-container textarea,
.form-container input[type="date"] {
    width: calc(100% - 22px); /* Adjusted width to accommodate padding and border */
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-container textarea {
    width: calc(100% - 22px); /* Adjusted width to accommodate padding and border */
    resize: vertical;
}

.form-container button {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s;
}

.form-container button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="product-container">
        <h1>Add Product</h1>
        <div class="form-container">
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
                $productname = $_POST['product-name'];
                $producttype = $_POST['product-type'];
                $quantity = $_POST['product-quantity'];
                $description = $_POST['product-description'];
                $expiry_date = $_POST['product-expiry'];
                $price = $_POST['product-price'];

                // Insert data into database
                $sql = "INSERT INTO addtoproduct (productname, producttype, quantity, description, expiry_date, price) VALUES ('$productname', '$producttype', '$quantity', '$description', '$expiry_date', '$price')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Product added successfully!'); window.location.href = 'mainframe.php';</script>";
        	    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close connection
                $conn->close();
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product-name" required>

                <label for="product-type">Product Type:</label>
                <input type="text" id="product-type" name="product-type" required>

                <label for="product-quantity">Product Quantity:</label>
                <input type="number" id="product-quantity" name="product-quantity" required>

                <label for="product-description">Description of Product:</label>
                <textarea id="product-description" name="product-description" rows="4" required></textarea>

                <label for="product-expiry">Expiry Date:</label>
                <input type="date" id="product-expiry" name="product-expiry" required>

                <label for="product-price">Price:</label>
                <input type="number" id="product-price" name="product-price" required>

                <button type="submit">Add Product</button>
            </form>
        </div>
    </div>
</body>
</html>