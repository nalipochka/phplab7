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
            <div class="col">
                <a href="addProduct.php" class="btn btn-primary">Add new product</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $mysqli = new mysqli("localhost", "root", "", "shopDb", 3306);
                        if (!$mysqli->connect_errno) {
                            $queryStr = "SELECT * from Products";
                            $res = $mysqli->query($queryStr);
                            while ($row = $res->fetch_array(MYSQLI_BOTH)) {
                                echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['Title'] . "</td><td>"
                                    . $row[2] . "</td><td><a class='btn btn-sm btn-primary' href='edit.php?id="
                                    . $row["Id"] . "'>Edit</a> | <a class='btn btn-sm btn-danger' href='delete.php?id="
                                    . $row["Id"] . "'>Delete</a><td><input type='checkbox' name='cb" 
                                    . $row[0] . "'></td>";
                            }
                        } else {
                            echo var_dump($mysqli->connect_error);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>