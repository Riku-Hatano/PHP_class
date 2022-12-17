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
    <link rel="stylesheet" href="./css/downloadPhp.css">
</head>
<body>
    <?php 
    if (isset($_GET['fileName'])) {
        $fileName = $_GET['fileName'];
        ///////////////////////////////////////////////////////////
        //I WILL MAKE DOWNLOAD FORM LATER. DONT FORGET!!!!!!!!!!!!!
        //AND I WILL MAKE THE KEY ENCRIPTED ALSO!!!!!!!!!!!!!!!!!!!
        ///////////////////////////////////////////////////////////
        echo "<form action='./VegDec.php' method='POST'>";
            echo "<label for'fileName'>file name: </label>";
            echo "<input type='text' name='fileName' id='fileName' value='$fileName' required>";//i will change here later
            echo "<label for'key'>key: </label>";
            echo "<input type='text' name='key' id='key' placeholder='key' required>";
            echo "<input type='submit' value='decript'>";
            //jump to decoding file with filename and key for decription. 
            //but i have to fix name="filename" because it doesnt have to put on input tag.
        echo "</form>";
    }
    ?>
</body>
</html>