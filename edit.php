<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?
    $id = $_GET["id"];
    $conn = new mysqli("localhost", "root", "","shopDb", 3306);
    if (!isset($_POST["editProduct"])) {
        if($conn->connect_error){
            die("Connetcted error:". $conn->connect_error);
        }
        $queryStr = "SELECT * FROM Products WHERE Id = $id";
        $res = $conn->query($queryStr);
        if(!($res->num_rows>0)){
            die("Product not find!");
        }
        $row = $res->fetch_assoc();
        $productTitle = $row["Title"];
        $productQuantity = $row["Quantity"];
    ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form method="post">
                        <div class="mb-3">
                            <label for="productTitle" class="form-label">Product title:</label>
                            <input value="<? echo $row["Title"]; ?>" type="text" class="form-control" id="productTitle" name="title" placeholder="Enter product title..." required>
                        </div>
                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Product title:</label>
                            <input value="<? echo $row["Quantity"]; ?>" type="number" class="form-control" id="productQuantity" name="quantity" placeholder="Enter product quantity..." required>
                        </div>
                        <button type="submit" class="btn btn-success" name="editProduct">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    <?
    }
    else{
        $query = "UPDATE Products SET Title = '".$_POST["title"]."', Quantity = ".$_POST["quantity"]." WHERE Id = $id";
        if ($conn->query($query) === TRUE) {
            echo "Product update success!";
        } else {
            echo "Product update error: " . $conn->error;
        }
        echo "<a href='index.php' class='btn btn-success'>Back to home</a>";

    }
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>