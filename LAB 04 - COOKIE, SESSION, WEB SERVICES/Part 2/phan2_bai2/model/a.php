<?php
    //header('Content-Type: application/json');
    function read_products() {
        include ("config.php");
        $query = "SELECT * FROM products";
        //echo "Hello";
        $product_info = mysqli_query($DBConnect, $query);
        // Retrieve product information
        if (!$product_info) {
            $message = 'Invalid query: ' . mysqli_error() . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = array();
        while ($row = mysqli_fetch_assoc($product_info)) {
            // Add the row to the data array
            $data[] = $row;
        }
        return json_encode($data);
    }
?>