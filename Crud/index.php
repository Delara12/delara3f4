<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 80%;
            max-width: 900px;
            background-color: #ffffff;
            border: 1px solid #d1d9e6;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #87ceeb;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .container a:hover {
            background-color: #00bfff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #d1d9e6;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f8ff;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions a {
            margin: 0 5px;
            color: #003366; 
            text-decoration: none;
            font-weight: bold;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product List</h2>
        <a href="create.php">Create New Product</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ID']); ?></td>
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td><?php echo htmlspecialchars($row['Description']); ?></td>
                <td><?php echo htmlspecialchars($row['Price']); ?></td>
                <td><?php echo htmlspecialchars($row['Quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['Created_at']); ?></td>
                <td><?php echo htmlspecialchars($row['Updated_at']); ?></td>
                <td class="actions">
                    <a href="update.php?id=<?php echo $row['ID']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['ID']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>