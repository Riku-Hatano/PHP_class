<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $key = $_POST['key'];
        $fileName = $_POST['fileName'];
        $file = fopen("./files/$fileName.txt", "r");
        $encriptedMessage = fread($file, filesize("./files/$fileName.txt"));
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
                $decriptedString = implode($decriptedString);
                echo "<p>$decriptedString</p>";
                echo "<p>$encriptedMessage</p>";
                echo "<a href='./index.php'>go back to main page</a>";
                exit();
                break;
            }
        }
        echo "your key is wrong!!!";
        echo "<a href='./index.php'>go back to main page</a>";
    }
?>