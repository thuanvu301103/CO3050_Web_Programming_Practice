<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phan 1 bai 2</title>
</head>
<body>
    <?php
    function myfunction ($number) {
        switch ($number % 5) {
            case 0:
                echo "Hello";
                break;
            case 1:
                echo "How are you?";
                break;
            case 2:
                echo "I'm doing well, thank you";
                break;
            case 3:
                echo "See you later";
                break;
            case 4:
                echo "Good-bye";
                break;
        }
    }
    $number_0 = 10;
    $number_1 = 11;
    $number_2 = 12;
    $number_3 = 13;
    $number_4 = 14;
    echo myfunction($number_0) . "<br>";
    echo myfunction($number_1) . "<br>";  
    echo myfunction($number_2) . "<br>";  
    echo myfunction($number_3) . "<br>";  
    echo myfunction($number_4) . "<br>";
    ?>
</body>
</html>