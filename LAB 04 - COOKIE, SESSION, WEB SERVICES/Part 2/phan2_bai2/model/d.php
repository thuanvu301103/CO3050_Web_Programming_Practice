<?php
    function delete_product($id) {
        include ("config.php");
        // Prepare a delete statement
        $query = "DELETE FROM products WHERE id = '{$id}'";
    
        $QueryResult = mysqli_query($DBConnect,$query); 
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>"; 
        }
    }
    

?>