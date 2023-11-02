<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style_detail.css">
    <title>phan 2|bai 2b|Detail</title>
</head>
<body>
    <?php
        /*Connect database*/
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
        
	?>
    <!--Navbar-->
    <nav class="navbar">
        <!-- Logo -->
        <a href="#" class="navbar-brand">
            ElectronicShop
            <!--img src="" alt="" style="width: 6rem"-->
        </a>

        <!-- NavLink -->
        <div class="navmenu">
            <a href="#category">DANH MỤC</a>
            <a href="#contact">LIÊN HỆ</a>
            <a href="#follow">THEO DÕI</a>
        </div>

        <!-- Search bar -->
        <input id="searchbar" type="text" placeholder="Search">

    </nav>

    <!-- Body -->
    <div>
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="category">
                    <div class="title">DANH MỤC</div>
                    <a href=""><div class="sidebar-link">Mobile</div></a>
                    <a href=""><div class="sidebar-link">Laptop</div></a>
                    <a href=""><div class="sidebar-link">PC</div></a>
                    <a href=""><div class="sidebar-link">Phụ kiện</div></a>
                </div>
                <div class="topproduct">
                    <div class="title">TOP SẢN PHẨM</div>
                    <a href=""><div class="sidebar-link">Đánh giá tốt nhất</div></a>
                    <a href=""><div class="sidebar-link">Rẻ nhất</div></a>
                    <a href="./list.php"><div class="sidebar-link">Bán chạy nhất</div></a>
                    <a href=""><div class="sidebar-link">Mới ra mắt</div></a>
                </div>
            </div>
            <!-- Product -->
            <div class="product">
                <div class="productnav">
                    <a href="">Home</a> >
                    <a href="./list.php">Bán chạy nhất</a>
                </div>
                <div class="main">
                    <div class="productimg">
                        <?php 
                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 1;
                            $query = "SELECT id, name, price, description, image FROM products WHERE id = {$id}";
                            $product_info = mysqli_query($DBConnect, $query);

                            if (!$product_info) {
                                $message = 'Invalid query: ' . mysqli_error() . "<br>";
                                $message .= 'Whole query: ' . $query;
                                die($message);
                            }
                            $product_info = mysqli_fetch_assoc($product_info);

                        ?>
                        <?php
                            echo "<div class='bigimg'><img src='{$product_info['image']}' alt='Product image'></div>";
                        ?>
                        
                    </div>
                    <div class="productinfo">
                        <?php 
                            echo "<div class='title'>{$product_info['name']}</div>"; 
                            echo "<div class='price'>{$product_info['price']} VND</div>"; 
                        ?>
                        
                        <fieldset>
                            <legend>Summary</legend>
                            <p>
                                This is a simple paragrah which summarizes description of product
                            </p>
                        </fieldset>
                        <form>
                            <input type="button" value="MUA">
                        </form>
                    </div>
                </div>
                <fieldset>
                    <legend>Description</legend>
                    <p>
                           <?php echo $product_info['description']; ?>
                    </p>
                </fieldset>
                 
            </div>
            
            <!-- Advertisement banner-->
            <div class="ad">
                <a href=""><img src="./img/adbanner.jpg" alt="Advertises banner"></a>
            </div>
        </div>
    </div>
       
    <!-- Footer section -->
    <footer>
        <div class="flex-column">
            <div class="title">HỖ TRỢ</div>
            <a href="">Chính sách đổi trả</a>
            <a href="">Theo giõi đơn hàng</a>
            <a href="">Bảng kích thước</a>
            <a href="">Bảo trì sản phẩm</a>
        </div>
        <div class="flex-column">
            <div class="title">THÔNG TIN DOANH NGHIỆP</div>
            <a href="">Về chúng tôi</a>
            <a href="">Chiết khấu</a>
            <a href="">Ứng dụng di động</a>
        </div>
        <div class="flex-column" id="contact">
            <div class="title">LIÊN HỆ VỚI CHÚNG TÔI</div>
            <a class="d-info" href=""><img alt="facebook_logo" src="./img/facebook.jpg"> Facebook</a>
            <a class="d-info" href=""><img alt="facebook_logo" src="./img/instargram.jpg"> Instagram</a>
            <a class="d-info" href=""><img alt="facebook_logo" src="./img/twitter.jpg"> Twitter</a>
            <a class="s-info" href=""><img alt="facebook_logo" src="./img/facebook.jpg"></a>
            <a class="s-info" href=""><img alt="facebook_logo" src="./img/instargram.jpg"></a>
            <a class="s-info" href=""><img alt="facebook_logo" src="./img/twitter.jpg"></a>
        </div>
        <div class="info">@2023 By Vu Ngoc Thuan</div>
    </footer>
</body>
</html>
