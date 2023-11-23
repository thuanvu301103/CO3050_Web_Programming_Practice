<!DOCTYPE html>
<?php   
    session_start();
    // If the user is logged in redirect to the login page...
    if (isset($_SESSION['loggedin'])) {
        header('Location: info.php');
        exit;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log in</title>
</head>
<body class="bg-dark">
    <?php 
        $username_err = $password_err = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['username'])) {
                $username_err = "Please enter your username";
            }
            if (empty($_POST['password'])) {
                $password_err = "Please enter your password";
            }
            if ($username_err == null && $password_err == null) {
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                header('Location: info.php');
            }
            if(!empty($_POST["remember"])) {
	            setcookie ("username",$_POST["username"],time()+ 3600);
	            setcookie ("password",$_POST["password"],time()+ 3600);
            } else {
	            setcookie("username","");
	            setcookie("password","");
	        }
            
        }
    ?>

    <div class="d-flex justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-50">
            <h1 class="text-white text-center fw-bold fs-1 py-4">Login</h1>
            <div class="form-group py-2">
                <label class="text-white py-2"><i class="fas fa-user text-white"></i> Username</label>
                <input type="text" name="username" id="username" placeholder="Please enter your username" 
                        class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"
                >
                <span class="invalid-feedback"><?php echo $username_err;?></span>
            </div>
            <div class="form-group py-2">
                <label class="text-white py-2"><i class="fas fa-lock text-white"></i> Password</label>
                <input type="password" name="password" id="password" placeholder="Please enter your password" 
                        class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                >
                <span class="invalid-feedback"><?php echo $password_err;?></span>
            </div>
            <div class="form-group py-3">
                <input type="checkbox" name="remember" /> <span class="text-white">Remember me <span>
            </div>
            <div class="d-flex justify-content-center"> 
                <input type="submit" value="Login" class="btn btn-success w-75">
            </div>
        </form>
    </div>
</body>
</html>