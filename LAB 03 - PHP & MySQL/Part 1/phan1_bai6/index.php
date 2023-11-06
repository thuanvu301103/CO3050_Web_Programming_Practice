<?php
    $fname = $lname = $email = $pass = $dd = $mm = $yyyy = $gender = $country = $about = null;
    $fname_err = $lname_err = $email_err = $pass_err = $DOB_err = $gender_err = $country_err = $about_err = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        $input_fname = trim($_POST["fname"]);
        if (empty($input_fname)){
            $fname_err = "Please enter your first name.";
        } elseif (strlen($input_fname) < 2 || strlen($input_fname) > 30){
            $fname_err = "First Name should have 2-30 characters.";
        } else{
            $fname = $input_fname;
        }
        $input_lname = trim($_POST["lname"]);
        if (empty($input_lname)){
            $lname_err = "Please enter your last name.";
        } elseif (strlen($input_lname) < 2 || strlen($input_lname) > 30){
            $lname_err = "Last Name should have 2-30 characters.";
        } else{
            $lname = $input_lname;
        }

        // Validate email
        $input_email = trim($_POST["email"]);
        $reg = "/^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*/";
        if (empty($input_email)){
            $email_err = "Please enter your email address.";
        } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email address.";
        } else{
            $email = $input_email;
        }

        // Validate password
        $input_pass = trim($_POST["pass"]);
        if (empty($input_pass)){
            $pass_err = "Please enter password.";
        } elseif (strlen($input_pass) < 2 || strlen($input_pass) > 30){
            $pass_err = "Password's length should be 2-30 characters.";
        } else{
            $pass = $input_pass;
        }

        // Validate DOB
        $input_dd = trim($_POST["dd"]);
        $input_mm = trim($_POST["mm"]);
        $input_yyyy = trim($_POST["yyyy"]);
        if ($input_dd == "dd" || $input_mm == "mm" || $input_yyyy == "yyyy") {
            $DOB_err = "Please choose your birthday!";
        }
        elseif (($input_mm == "2" && ($input_dd == "30" || $input_dd == "31")) || (($input_mm == "4" || $input_mm == "6" || $input_mm == "9" || $input_mm == "11") && $input_dd == "31")) {
            $DOB_err = "Invalid day of birth.";
        }
        else {
            $dd = $input_dd;
            $mm = $input_mm;
            $yyyy = $input_yyyy;
        }

        // Validate gender
        if (isset($_POST["gender"])) {
            $input_gender = trim ($_POST["gender"]);
            $gender = $input_gender;
        }
        else{
            $gender_err = "Please choose your gender.";
        }

        // Validate country
        $input_country = trim($_POST["country"]);
        if ($input_country == "Choose country"){
            $country_err = "Please choose your country.";
        } else{
            $country = $input_country;
        }

        // Validate about
        $input_about = trim($_POST["about"]);
        if (empty($input_about)){
            $about_err = "Please fill in About section.";
        } elseif (strlen($input_about) > 10000){
            $about_err = "The About section contains maximum of 10,000 characters!";
        } else{
            $about = $input_about;
        }


        // Complete
        if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($pass_err) && empty($DOB_err) && empty($gender_err) && empty($country_err) && empty($about_err)){
            /*
                Insert database
            */
            
            // After submission completed
            echo '<script type="text/javascript">
                window.onload = function () { alert("Submission is completed"); } 
                </script>';
            $fname = $lname = $email = $pass = $dd = $mm = $yyyy = $gender = $country = $about = null;
            $fname_err = $lname_err = $email_err = $pass_err = $DOB_err = $gender_err = $country_err = $about_err = null;
        }

    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Simple Sign-up Form</title>
</head>
<body class="bg-info bg-opacity-25 d-flex flex-row flex-wrap justify-content-center">
    <div class="col-md-7 d-flex flex-column p-0">
        <div class="bg-info bg-opacity-50 rounded-top-5 mt-2" style="height:0.5rem;"></div>
        <header class="bg-white rounded-bottom-2 mb-2 p-4">
            <h2 class="mb-4 font-bold">Sign up</h2>
            <p> Please fill your information for signing up our website! </p>
            <p> Deadline for closing registration form: 12:00AM - 10/22/20XX </p>
            <p> If you have any questions, please contact us via phone number (+84) 000-0000 or via email: <a href="#">no_reply@example.com </a> </p>
            <div class="text-danger border-top decoration-italic">Items marked * are must required items</div>
        </header>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Name <span class="text-danger">*</span></h6>
                <!--First name-->
                <div class="input-group my-3">
                    <span class="input-group-text">First name</span>
                    <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" 
                            placeholder="Enter your first name" value="<?php echo $fname; ?>">
                    <span class="invalid-feedback"><?php echo $fname_err;?></span>
                </div>
                <!--Last name-->
                <div class="input-group my-3">
                    <span class="input-group-text">Last name</span>
                    <input type="text" name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" 
                            placeholder="Enter your last name" value="<?php echo $lname; ?>">
                    <span class="invalid-feedback"><?php echo $lname_err;?></span>
                </div>
            </div>

            <!--Email-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Email <span class="text-danger">*</span></h6>
                <div class="input-group my-3">
                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" 
                            placeholder="Enter your email address" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err;?></span>
                </div>
            </div>

            <!--Password-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Password <span class="text-danger">*</span></h6>
                <div class="input-group my-3">
                    <input type="password" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>" 
                            placeholder="Enter password" value="<?php echo $pass; ?>">
                    <span class="invalid-feedback"><?php echo $pass_err;?></span>
                </div>
            </div>

            <!--DOB-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Birthday (dd/mm/yyyy) <span class="text-danger">*</span></h6>
                <div class="d-flex flex-row <?php echo (!empty($DOB_err)) ? 'is-invalid' : ''; ?>">
                    <select name="dd" class="form-select my-3 w-25">
                        <?php 
                            if (empty($dd) || !empty($DOB_err)) {
                                echo "<option selected> dd </option>";
                                for ($i=1; $i<=31; $i++) {
                                    echo "<option value='{$i}'>{$i}</option>";
                                }
                            }
                            else {
                                echo "<option> dd </option>";
                                for ($i=1; $i<=31; $i++) {
                                    if ($dd == $i) {
                                         echo "<option selected value='{$i}'>{$i}</option>"; 
                                    }
                                    else {
                                        echo "<option value='{$i}'>{$i}</option>";
                                    }
                                }
                            }
                        ?>
                        
                    </select>
                    <select name="mm" class="form-select my-3 w-25">
                        <?php 
                            if (empty($mm) || !empty($DOB_err)) {
                                echo "<option selected> mm </option>";
                                for ($i=1; $i<=12; $i++) {
                                    echo "<option value='{$i}'>{$i}</option>";
                                }
                            }
                            else {
                                echo "<option> mm </option>";
                                for ($i=1; $i<=12; $i++) {
                                    if ($mm == $i) {
                                         echo "<option selected value='{$i}'>{$i}</option>"; 
                                    }
                                    else {
                                        echo "<option value='{$i}'>{$i}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                    <select name="yyyy" class="form-select my-3 w-25">
                        <?php 
                            if (empty($yyyy) || !empty($DOB_err)) {
                                echo "<option selected> yyyy </option>";
                                for ($i=1920; $i<=2023; $i++) {
                                    echo "<option value='{$i}'>{$i}</option>";
                                }
                            }
                            else {
                                echo "<option> yyyy </option>";
                                for ($i=1920; $i<=2023; $i++) {
                                    if ($yyyy == $i) {
                                         echo "<option selected value='{$i}'>{$i}</option>"; 
                                    }
                                    else {
                                        echo "<option value='{$i}'>{$i}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <span class="invalid-feedback"><?php echo $DOB_err;?></span>
            </div>

            <!--Gender-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Gender <span class="text-danger">*</span></h6>
                <div class = "<?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                <div class="form-check my-2">
                    <input <?php echo ($gender == "male") ? "checked" : ""; ?> 
                            class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check my-2">
                    <input <?php echo ($gender == "female") ? "checked" : ""; ?>
                            class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="form-check my-2">
                    <input <?php echo ($gender == "others") ? "checked" : ""; ?>
                            class="form-check-input" type="radio" name="gender" id="others" value="others">
                    <label class="form-check-label" for="others">
                        Others
                    </label>
                </div>
                </div>
                <span class="invalid-feedback"><?php echo $gender_err;?></span>
            </div>

            <!--Country-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">Country <span class="text-danger">*</span></h6>
                <select name="country" class="form-select my-3 <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>">
                    <option <?php echo ($country == "Choose country" || empty($country)) ? "selected" : ""; ?> >
                        Choose country
                    </option>
                    <option <?php echo ($country == "Viet Nam") ? "selected" : ""; ?> value="Viet Nam">
                        Viet Nam
                    </option>
                    <option <?php echo ($country == "Australia") ? "selected" : ""; ?> value="Australia">
                        Australia
                    </option>
                    <option <?php echo ($country == "United States") ? "selected" : ""; ?> value="United States">
                        United States
                    </option>
                    <option <?php echo ($country == "India") ? "selected" : ""; ?> value="India">
                        India
                    </option>
                    <option <?php echo ($country == "Others") ? "selected" : ""; ?> value="Others">
                        Others
                    </option>
                </select>
                <span class="invalid-feedback"><?php echo $country_err;?></span>
            </div>

            <!--About-->
            <div class="bg-white rounded-2 my-2 p-4">
                <h6 class="border-bottom pb-2">About <span class="text-danger">*</span></h6>
                <textarea name="about" class="form-control my-3 <?php echo (!empty($about_err)) ? 'is-invalid' : ''; ?>" 
                            placeholder="Decribe yourself" value="<?php echo $about; ?>"></textarea>
                <span class="invalid-feedback"><?php echo $about_err;?></span>

            </div>
            <div class="d-flex flex-row justify-content-between">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" id="reset-button"
                        class="btn text-primary fw-bold text-center">
                </input>
            </div>

        </form>
       
        <footer class="d-flex flex-column mt-3 mb-3">
            <div class="text-center text-secondary p-2">
                <a href="#" class="link-secondary link-underline link-underline-opacity-0">Report Abuse</a> - 
                <a href="#" class="link-secondary link-underline link-underline-opacity-0">Terms of Service</a> - 
                <a href="#" class="link-secondary link-underline link-underline-opacity-0">Privacy Policy Form</a>
            </div>
        </footer>
    </div>
</body>
</html>