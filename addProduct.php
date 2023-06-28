<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <?
            if (!isset($_POST["title"])) {
            ?>
                <div class="col">
                    <form method="post">
                        <div class="mb-3">
                            <label for="productTitle" class="form-label">Product title:</label>
                            <input type="text" class="form-control" id="productTitle" name="title" placeholder="Enter product title..." required>
                        </div>
                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Product title:</label>
                            <input type="number" class="form-control" id="productQuantity" name="quantity" placeholder="Enter product quantity..." required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </form>
                </div>
            <?
            } else {
                $link = mysqli_connect("localhost", "root", "", "shopDb", 3306);
                $productTitle = $_POST["title"];
                $productQuantity = $_POST["quantity"];
                $queryText = "INSERT INTO `Products`(`Title`, `Quantity`) VALUES ('$productTitle','$productQuantity')";
                $ins = mysqli_query($link, $queryText);
                if ($ins) {
                    echo "<div class='alert alert-success' rol='alert'>Product succesfully inserted</div>";
                    echo "<a href='index.php' class='btn btn-success'>Back to home</a>";
                } else {
                    echo "<div class='alert alert-warning' rol='alert'>Error!</div>";
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>