<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>phan 2|bai 3|List Product</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex flex-row p-4">
            <h1> READ PRODUCT </h1>
        </div>
        <div class="d-flex flex-row px-4">
            <a href="./b.php" role="button" class="btn btn-success rounded-2">
                <i class="fa fa-plus"></i> Add New Product
            </a>
        </div>
        <!--Data Table-->
        <div class="d-flex flex-row p-4">
            <?php
                // Include config file
                require_once "./config.php";
                $query = "SELECT * FROM products";
                $product_info = mysqli_query($DBConnect, $query);
                // Retrieve product information
                if (!$product_info) {
                    $message = 'Invalid query: ' . mysqli_error() . "<br>";
                    $message .= 'Whole query: ' . $query;
                    die($message);
                }
                echo "  <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th style='width: 5%;' class='text-center'>ID</th>
                                    <th style='width: 15%;' class='text-center'>Name</th>
                                    <th style='width: 50%;' class='text-center'>Description</th>
                                    <th style='width: 10%;' class='text-center'>Price</th>
                                    <th style='width: 20%;' class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                // Represent data on table
                if (mysqli_num_rows($product_info) != 0) {
                    while ($item = mysqli_fetch_assoc($product_info)) {
                        echo "<tr>";
                        echo "<td style='width: 5%;' class='text-center'>" . $item['id'] . "</td>";
                        echo "<td style='width: 15%;'>" . $item['name'] . "</td>";
                        echo "<td style='width: 50%;'>" . $item['description'] . "</td>";
                        echo "<td style='width: 10%;' class='text-center'>" . $item['price'] . "</td>";
                        echo "<td style='width: 20%;' class='text-center'>";
                            echo '<a href="read.php?id='. $item['id'] .'" role="button" class="btn btn-info rounded-2" ><span class="fa fa-eye"></span></a>';
                            echo '<a href="c.php?id='. $item['id'] .'" role="button" class="btn btn-primary rounded-2" ><span class="fa fa-pencil"></span></a>';
                            echo '<a href="d.php?id='. $item['id'] .'" role="button" class="btn btn-danger rounded-2" ><span class="fa fa-trash"></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                else {
                    echo "<tr>";
                        echo "<td colspan = '5' class='text-center'>No record is found</td>";   
                    echo "</tr>";
                }
                echo "      </tbody>
                        </table>";
                
            ?>
        </div>
    </div>
    
</body>
</html>