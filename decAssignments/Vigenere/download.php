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
        // session_start();
        // $_SESSION['fileName'] = $fileName;

        echo "<form action='./VegDec.php' method='POST'>";
        // echo "<form action=".$_SERVER['PHP_SELF']."?decriptedFilePath=$fileName method='GET'>";
            echo "<input type='text' name='fileName' value='$fileName'>";
            echo "<input type='text' name='key' placeholder='key'>";
            echo "<input type='submit' value='decript'>";
        echo "</form>";
    }
    // if (isset($_GET['key'])) {
    //     echo "<p>".$_GET['key']."</p>";
    //     echo "<p>".$_SERVER['QUERY_STRING']['decriptedFilePath']."</p>";
    // }
    ?>
</body>
</html>