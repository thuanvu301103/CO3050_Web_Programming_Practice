<!DOCTYPE html>
<?php
    session_start();
    // If the user is logged in redirect to the login page
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
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
    <title>Information</title>
</head>
<body class="bg-dark">
    <div class="d-flex justify-content-center">
        <div class="w-50">
            <h1 class="text-white text-center fw-bold fs-1 py-4">User's information</h1>
            <div>
                <label class="text-white py-2 fw-bold"><i class="fas fa-user text-white"></i> Username: </label>
                <?php echo "<span class='text-center text-white'>".$_SESSION["username"]."</span>"; ?>
            </div>
            <div>
                <label class="text-white py-2 fw-bold"><i class="fas fa-lock text-white"></i> Password:</label>
                <?php echo "<span class='text-center text-white'>".$_SESSION["password"]."</span>"; ?>
            </div>
            <div class="d-flex py-5 justify-content-center"> 
                <a href="logout.php" class="btn btn-danger w-75"> Log out</a>
            </div>
        </div>
    </div>
</body>
</html>