<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $key = $_POST['key'];
        $encriptedFile = $_FILES['file'];
        $tmpPath = $encriptedFile['tmp_name'];
        $fileName = pathinfo($encriptedFile['name'], PATHINFO_FILENAME);
        $file = fopen($tmpPath, "r");
        $encriptedMessage = fread($file, filesize("$tmpPath"));
        fclose($file);
        
        $file = fopen('./path.json', 'r');
        $jsonString = fread($file, filesize('./path.json'));
        $decodedData = json_decode($jsonString, true);
        fclose($file);

        foreach ($decodedData as $eachData) {
            if ($eachData['fileName'] == $fileName && $eachData['key'] == $key) {
                $VigString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&'()-=^|@`]{;+:*[},<.>/? ";

                $decriptedString = [];
                for ($i = 0 ; $i < strlen($encriptedMessage) ; $i++) {
                    $currentKey = $key[$i % strlen($key)];
                    $currentLetter = $encriptedMessage[$i];
                    $ck = strpos($VigString, $currentKey);
                    $cl = strpos($VigString, $encriptedMessage[$i]);
                    $decriptedLetter = $VigString[($cl - $ck) % strlen($VigString)];
                    array_push($decriptedString, $decriptedLetter);
                    //what the proposal doing here is same as encode.
                    //by substract $ck from $cl, we can decript. 
                }

                $file = fopen($tmpPath, 'w');
                $decriptedString = implode($decriptedString);
                fwrite($file, $decriptedString);
                fclose($file);
                echo "<p>decripted message: $decriptedString</p>";
                // echo "<p>ecnripted message: $encriptedMessage</p>";
                echo "<a href='./index.php'>go back to main page</a>";
                exit();
       
                break;
            }
        }
        echo "your key is wrong!!!";
        echo "<a href='./index.php'>go back to main page</a>";
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

    }
?>