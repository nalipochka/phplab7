<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?
$conn = new mysqli("localhost", "root", "", "shopDb", 3306);
if ($conn->connect_error) {
    die("Connected error: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM Products WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // Выполняем SQL-запрос для удаления товара
        $deleteQuery = "DELETE FROM Products WHERE id = $id";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
}
echo "<a href='index.php' class='btn btn-success'>Back to home</a>";

$conn->close();
?>
</body>
</html>