<?php
    // Include config file
    require_once "config.php";
    $name = $price = $desc = $image = null;
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = trim($_GET["id"]);
        $query = "SELECT * FROM products WHERE id = '{$id}'";
        $QueryResult = mysqli_query($DBConnect,$query); 
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
        }
        else {
            $product_info = mysqli_fetch_assoc($QueryResult);
            $name = $product_info['name'];
            $desc = $product_info['description'];
            $price = $product_info['price'];
            $image = $product_info['image'];
        }
        // Close connection
        mysqli_close($DBConnect);
    }
    // Process delete operation after confirmation
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = trim($_POST["id"]);
        // Prepare a delete statement
        $query = "DELETE FROM products WHERE id = '{$id}'";
    
        $QueryResult = mysqli_query($DBConnect,$query); 
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
        }
        else {
            // Close connection
            mysqli_close($DBConnect);
            header("location: a.php");
            exit();
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>phan2|bai 3|Delete Product</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="mt-5 mb-3">DELETE PRODUCT</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                    <p>Are you sure you want to delete this product?</p>
                    <p><span class="fw-bold">ID:</span> <?php echo $_GET["id"]?></p>
                    <p><span class="fw-bold">Name:</span> <?php echo $name?></p>
                    <p><span class="fw-bold">Description:</span> <?php echo $desc?></p>
                    <p><span class="fw-bold">Price:</span> <?php echo $price?></p>
                    <p><span class="fw-bold">Image link:</span> <?php echo $image?></p>
                    <p>
                        <input type="submit" value="Yes" class="btn btn-danger">
                        <a href="a.php" class="btn btn-secondary">No</a>
                    </p>
                </div>
            </form>
        </div>        
    </div>
</body>
</html>