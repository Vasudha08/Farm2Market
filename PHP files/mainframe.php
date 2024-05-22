<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm2Market - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS styles specific to this page */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        .dashboard-container {
            background-color: #fff;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .dashboard-container h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .dashboard-button {
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }
        .dashboard-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to Your Farm2Market Dashboard</h1>
        <div class="button-container">
            <a class="dashboard-button" href="addtoproduct.php">Add Products</a>
            <a class="dashboard-button" href="editproduct.php">Edit Products</a>
            <a class="dashboard-button" href="manageorders.php">Manage Orders</a>
            <a class="dashboard-button" href="viewprofile.php">View Profile</a>
        </div>
    </div>
</body>
</html>