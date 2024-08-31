<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (Name, Description, Price, Quantity) VALUES ('$name', '$description', '$price', '$quantity')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New product created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            border: 1px solid #d1d9e6;
            border-radius: 10px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1d9e6;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f0f8ff;
            outline: none;
        }
        .form-container input[type="text"]:focus,
        .form-container input[type="number"]:focus,
        .form-container textarea:focus {
            border-color: #87ceeb;
            box-shadow: 0 0 5px rgba(135, 206, 235, 0.5);
        }
        .form-container input[type="submit"] {
            background-color: #87ceeb;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            width: 100%;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #00bfff;
        }
        .form-container a {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #87ceeb;
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create New Product</h2>
        <form method="POST" action="create.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="1" min="0" required>
            
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" step="1" min="0" required>
            
            <input type="submit" value="Create">
        </form>
        <a href="index.php">Back to Product List</a>
    </div>
</body>
</html>

