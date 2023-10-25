<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Phan 1 bai 4</title>
</head>
<body>
    <table>
    <?php 
        for ($i = 1; $i <= 7; $i++) {
            echo "<tr>";

            for ($j = 1; $j <= 7; $j++) {
                $data = $i * $j;
                echo "<td> $data </td>";
            }

            echo "</tr>";
        } 
    ?>
    </table>

</body>
</html>