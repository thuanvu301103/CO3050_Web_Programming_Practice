<?php 
	//header('Content-Type: application/json');
	include_once(__DIR__."/../model/a.php");
	include_once(__DIR__."/../model/b.php");
	include_once(__DIR__."/../model/c.php");
	include_once(__DIR__."/../model/d.php");
	//$result = "An error has occured";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (!empty($_POST["id"])) {
			echo update_product($_POST["id"], $_POST["name"], $_POST["description"], $_POST["price"], $_POST["image"]);
		}
		else {
			echo add_product($_POST["name"], $_POST["description"], $_POST["price"], $_POST["image"]);
		}
	} 

	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		
		echo delete_product($_GET["id"]);

	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		if (isset($_GET["id"])) {
			echo show_product($_GET["id"]);
		}
		else {
			echo read_products();
		}
	}

?>