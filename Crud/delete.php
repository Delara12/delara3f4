<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE ID = $id";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: index.php");
exit;
?>
