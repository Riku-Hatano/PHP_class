<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere index</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <?php
        if (isset($_GET['msg']) == true) {
            echo "<h2>".$_GET['msg']."</h2>";
        }
        //if we send file successfully, VegEnc will send querystring and show message here.
        //so, if we can visit this page for the first time, msg will not be shown.
    ?>
    <form action="./VegEnc.php" method="POST">
        <input type="text" name="note" placeholder="note" required>
        <input type="text" name="key" placeholder="key" required>
        <textarea name="message" cols="30" rows="10" required></textarea>
        <input type="submit" value="send message">
    </form>
    <ul>
        <?php
            if (file_exists('./path.json')) {
                $file = fopen('./path.json', 'r');
                $files = json_decode(fread($file, filesize('./path.json')), true);
                echo "<h3>download links</h3>";
                echo "<ul>";
                foreach ($files as $eachFile) {
                    $fileName = $eachFile['fileName'];
                    $note = $eachFile['note'];
                    echo "<li>note: $note  ";
                    echo "<a href='./download.php?fileName=$fileName'>$fileName</a>";
                    echo "</li>";
                    //show all of ecripted or decripted files in "./file".
                    //to click the a tag, we will jump to another page and decript that file with key.
                }
                echo "</ul>";
            } else {
                echo "<h3>no files yet!!</h3>";
                //if there were no file, this will be shown instead of the list of files. 
            }
        ?>
    </ul>
</body>
</html>