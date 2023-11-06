<?php
    // Include config file
    require_once "config.php";
 
    // Define variables and initialize with empty values
    $name = $desc = $price = $image = null;
    $name_err = $desc_err = $price_err = $image_err = null;
    $id = null;
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Get hidden input value
        $id = $_POST["id"];
    
        // Validate name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)){
            $name_err = "Please enter product's name.";
        } elseif (strlen($input_name) < 5 || strlen($input_name) > 40){
            $name_err = "The length of product's name must be between 5 and 40.";
        } else{
            $name = $input_name;
        }
    
        // Validate desc
        $input_desc = trim($_POST["description"]);
        if(empty($input_desc)){
            $desc_err = "Please enter product's description."; 
        } elseif (strlen($input_desc) > 500){
            $desc_err = "Product's description should have below 500 characters.";    
        } else{
            $desc = $input_desc;
        }
    
        // Validate price
        $input_price = trim($_POST["price"]);
        if(empty($input_price)){
            $price_err = "Please enter product's price.";     
        } elseif(!is_numeric($input_price)){
            $price_err = "Product's price must be in numeric form.";
        } else{
            $price = $input_price;
        }

        // Validate image link
        $input_img = trim($_POST["image"]);
        if(empty($input_img)){
            $image_err = "Please enter product's image link.";     
        } elseif(strlen($input_img) > 255){
            $image_err = "Link can not be over 255 characters long.";
        } else{
            $image = $input_img;
        }
    
        // Check input errors before inserting in database
        if(empty($name_err) && empty($desc_err) && empty($price_err) && empty($image_err)){
            // Prepare an update statement
            $query = "UPDATE products SET name='{$name}', description='{$desc}', price='{$price}', image='{$image}' WHERE id='{$id}'";
            $QueryResult = mysqli_query($DBConnect,$query); 
            if ($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
            }
            // After submission refresh the page
            echo '<script type="text/javascript">
                window.onload = function () { alert("Submission is completed"); } 
                </script>';
            $name_err = $desc_err = $price_err = $image_err = null;
        }
    }
    else{
        // Process when user click edit data in a.php (show old information)
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            $id =  trim($_GET["id"]);
        
            // Prepare a select statement
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
    <title>phan2|bai 3|Edit Product</title>
</head>
<body>
    <div class="container p-6">
        <div class="row">
            <h1 class="my-3">EDIT PRODUCT</h1>
            <p>Please fill in this form and submit to edit product's information.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Id</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control <?php echo (!empty($desc_err)) ? 'is-invalid' : ''; ?>"><?php echo $desc; ?></textarea>
                    <span class="invalid-feedback"><?php echo $desc_err;?></span>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err;?></span>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="text" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                    <span class="invalid-feedback"><?php echo $image_err;?></span>
                </div>
                <div class="py-4" style="text-align: right;">
                    <input type="submit" class="btn btn-success" value="Submit">
                    <a href="./c.php?id=<?php echo $id;?>" class="btn btn-primary ml-2">Reload</a>
                    <a href="./a.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
        </div>        
    </div>
</body>
</html>