<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        echo "illegal method!!";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>download file</title>
</head>
<body>
    <?php 
    if (isset($_GET['fileName'])) {
        $fileName = $_GET['fileName'];

        echo "<form action='./VegDec.php' method='POST'>";
            echo "<input type='text' name='fileName' value='$fileName'>";//i will change here later
            echo "<input type='text' name='key' placeholder='key'>";
            echo "<input type='submit' value='decript'>";
            //jump to decoding file with filename and key for decription. 
            //but i have to fix name="filename" because it doesnt have to put on input tag.
        echo "</form>";
    }
    ?>
</body>
</html>