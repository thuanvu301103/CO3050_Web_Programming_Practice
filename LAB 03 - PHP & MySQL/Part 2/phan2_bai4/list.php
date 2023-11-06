<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$DBConnect = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$DBConnect) {
  		die("Connection failed: " . mysqli_connect_error());
	}

    // Select database
    $shop_DB = mysqli_select_db ($DBConnect, "shop");
    if (!$shop_DB) {
		die("Cannot use database" . mysqli_error($DBConnect));
    }

	$query = "SELECT * FROM products";
    $product_info = mysqli_query($DBConnect, $query);
	// Retrieve product information
    if (!$product_info) {
        $message = 'Invalid query: ' . mysqli_error() . "<br>";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    // Calculate number of products
    $num_product = mysqli_num_rows($product_info);
    // Calculate number of pages
    $num_product_on_page = 6;
    $num_page = ceil($num_product/$num_product_on_page);
    // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    
    // Handler: client request non-existed page
    if ($page <= 0 || $page > $num_page) {
        echo "NO_PAGE";
    }
    else {
        // Calculate the start product info to get the result
        $product_start = ($page - 1) * $num_product_on_page;
        // Selecet specific product info for this $page
        $query = "SELECT id, name, price, image FROM products LIMIT {$product_start}, {$num_product_on_page}";
        $product_info = mysqli_query($DBConnect, $query);
        $info = array ();
        while ($item = mysqli_fetch_assoc($product_info)) {
            array_push($info, json_encode(array("id"=>$item["id"], "name"=>$item["name"], "price"=> $item["price"], "image"=>$item["image"])));
        }
        echo json_encode(array("num_page"=>$num_page, "curr_page"=>$page,
                                "info"=>json_encode($info)));
        
    }
    mysqli_close($DBConnect);
    
?>