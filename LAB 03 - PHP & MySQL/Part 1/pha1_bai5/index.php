<?php
    $num1 = $num2 = $result = $op = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["num1"])) {$num1 = $_POST["num1"];}
        if (isset($_POST["num2"])) {$num2 = $_POST["num2"];}
        if (!(isset($_POST["op"]))) {
            echo "  <script>
                        alert('Please choose an operators!');
                    </script>
            ";
        }
        else {
            $op = $_POST["op"];
            if ($op == "add" || $op == "sub" || $op == "mul" || $op == "divi" || $op == "pow") {
                if ($num1 == null || $num2 == null) {
                    echo "  <script>
                                alert('Please enter enough number!');
                            </script>
                    ";  
                }
                else {
                    if ($op == "add") {$result = $num1+$num2;}
                    elseif ($op == "sub") {$result = $num1-$num2;}
                    elseif ($op == "mul") {$result = $num1*$num2;}
                    elseif ($op == "divi") {
                        if ($num2 == 0) {
                            echo "  <script>
                                        alert('Cannot divided by 0');
                                    </script>
                            ";  
                        }
                        else {
                            $result = $num1/$num2;
                        }
                    }
                     elseif ($op == "pow") {$result = pow($num1, $num2);}
                }
            }
            else {
                if ($num2 != null) {
                    echo "  <script>
                                alert('You jusst need to enter the first number, Please delete the second number!');
                            </script>
                    ";  
                }
                else {
                    $result = pow($num1, -1);
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Simple Calculator</title>
</head>
<body class="container-fluid bg-dark m-0 p-0 vh-100">
    <div class="d-flex flex-column text-center justify-content-between">
        <h1 class="fw-bold mb-11 text-white">Simple Calculator</h1>
        <div class="fw-bold text-white" style="margin-bottom: 5rem;">
            <span class="text-warning">Intruction</span>: Enter two operands then press <span class="text-info border-info">=</span> to calculate result <br>
            For inversion, you jusst need to enter the first number.
        </div>
        <form style="height: 20rem;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="d-flex text-center justify-content-center" style="height: 20%">
                <input type="number" name="num1" step="any" style="width: 25%;" value="<?php echo ($num1 != null)? $num1:"";?>"
                        class="bg-info bg-opacity-10 border-light text-center text-white" placeholder="First Number">
                <input type="number" name="num2" step="any" style="width: 25%;" value="<?php echo ($num2 != null)? $num2:"";?>"
                        class="bg-info bg-opacity-10 border-light text-center text-white" placeholder="Second Number">
            </div>
            <input type="number" name="result" style="width: 50%; height: 20%" value="<?php echo (isset($result))? $result:"";?>"
                class="bg-info bg-opacity-10 border-light text-center text-white" placeholder="Result" readonly>
            <div class="d-flex text-center justify-content-center">
                <div class="btn-group" role="group" style="width: 50%;" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="op" id="add" autocomplete="off" value="add"
                        <?php echo ($op == "add")? "checked": ""; ?>>
                    <label class="btn btn-outline-info" for="add">+</label>

                    <input type="radio" class="btn-check" name="op" id="sub" autocomplete="off" value="sub"
                        <?php echo ($op == "sub")? "checked": ""; ?>>
                    <label class="btn btn-outline-primary" for="sub">-</label>

                    <input type="radio" class="btn-check" name="op" id="mul" autocomplete="off" value="mul"
                        <?php echo ($op == "mul")? "checked": ""; ?>>
                    <label class="btn btn-outline-success" for="mul">*</label>

                    <input type="radio" class="btn-check" name="op" id="divi" autocomplete="off" value="divi"
                        <?php echo ($op == "divi")? "checked": ""; ?>>
                    <label class="btn btn-outline-warning" for="divi">/</label>

                    <input type="radio" class="btn-check" name="op" id="pow" autocomplete="off" value="pow"
                        <?php echo ($op == "pow")? "checked": ""; ?>>
                    <label class="btn btn-outline-danger" for="pow">pow</label>

                    <input type="radio" class="btn-check" name="op" id="inv" autocomplete="off" value="inv"
                        <?php echo ($op == "inv")? "checked": ""; ?>>
                    <label class="btn btn-outline-light" for="inv">inv</label>

                </div>
            </div>
            <div class="d-flex text-center justify-content-center">
                <input type="submit" style="width: 50%; height: 20%;" class="btn btn-success" value="=">
            </div>
        </form>
    </div>   
</body>
</html>