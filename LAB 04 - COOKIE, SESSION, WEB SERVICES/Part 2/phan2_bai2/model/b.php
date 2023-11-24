<?php
    function add_product($name, $desc, $price, $image) {
        include_once (__DIR__."/./config.php");
        $name_err = $desc_err = $price_err = $image_err = "none";

        $data = array();

        // Validate name
        $input_name = trim($name); // Cut out all blank space, tab, newline... from name
        if (strlen($input_name) < 5 || strlen($input_name) > 40){
            $name_err = "The length of product's name must be between 5 and 40.";
        }
        $data["name_err"] = $name_err;
            
        // Validate desc
        $input_desc = trim($desc);
        if (strlen($input_desc) > 500){
            $desc_err = "Product's description should have below 500 characters."; 
        } 
        $data["desc_err"] = $desc_err;
        
        // Validate price
        $input_price = trim($price);
        if(!is_numeric($input_price)){
            $price_err = "Product's price must be in numeric form.";
        } 
        $data["price_err"] = $price_err;


        // Validate image link
        $input_img = trim($image);
        if(strlen($input_img) > 255){
            $image_err = "Link can not be over 255 characters long.";
        } 
        $data["image_err"] = $image_err;

        // Check input errors before inserting in database
        if(($name_err == "none") && ($desc_err == "none") && ($price_err == "none") && ($image_err == "none")){
            // Prepare an insert statement
            $query = "INSERT INTO products (name, description, price, image) VALUES ('{$name}', '{$desc}', '{$price}', '{$image}')";
            $QueryResult = mysqli_query($DBConnect,$query); 
            if ($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
            }
            // After submission completed
            return json_encode($data);
            //$name = $desc = $price = $image = "";
            //$name_err = $desc_err = $price_err = $image_err = "";
        }
       
        return json_encode($data);
    }
?>