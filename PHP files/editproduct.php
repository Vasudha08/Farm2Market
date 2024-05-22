<?php
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

// Initialize variables
$product_id = ""; // Variable to store the selected product ID
$product_name = "";
$product_type = "";
$product_quantity = "";
$product_description = "";
$product_expiry = "";
$product_price = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['select-product'];
    $product_name = $_POST['product-name'];
    $product_type = $_POST['product-type'];
    $product_quantity = $_POST['product-quantity'];
    $product_description = $_POST['product-description'];
    $product_expiry = $_POST['product-expiry'];
    $product_price = $_POST['product-price'];

    // Update product information in the database
    $sql = "UPDATE addtoproduct SET productname='$product_name', producttype='$product_type', quantity='$product_quantity', description='$product_description', expiry_date='$product_expiry', price='$product_price' WHERE id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Product updated successfully</p>";
    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    // If product is selected, retrieve its information from the database
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Retrieve product information from the database
        $sql = "SELECT * FROM addtoproduct WHERE id='$product_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_name = $row['productname'];
            $product_type = $row['producttype'];
            $product_quantity = $row['quantity'];
            $product_description = $row['description'];
            $product_expiry = $row['expiry_date'];
            $product_price = $row['price'];
        } else {
            echo "Product not found";
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market - Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="edit-product-container">
        <h1>Edit Product</h1>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="select-product" value="<?php echo $product_id; ?>">

                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product-name" value="<?php echo $product_name; ?>" required>

                <label for="product-type">Product Type:</label>
                <input type="text" id="product-type" name="product-type" value="<?php echo $product_type; ?>" required>

                <label for="product-quantity">Product Quantity:</label>
                <input type="number" id="product-quantity" name="product-quantity" value="<?php echo $product_quantity; ?>" required>

                <label for="product-description">Description of Product:</label>
                <textarea id="product-description" name="product-description" rows="4" required><?php echo $product_description; ?></textarea>

                <label for="product-expiry">Expiry Date:</label>
                <input type="date" id="product-expiry" name="product-expiry" value="<?php echo $product_expiry; ?>" required>

                <label for="product-price">Price:</label>
                <input type="number" id="product-price" name="product-price" value="<?php echo $product_price; ?>" required>

                <button type="submit">Edit Product</button>
            </form>
        </div>
    </div>
</body>
</html>