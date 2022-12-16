<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $key = $_POST['key'];
        $fileName = $_POST['fileName'];
        $file = fopen("./files/$fileName.txt", "r");
        $encriptedMessage = fread($file, filesize("./files/$fileName.txt"));
       

        $VigString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&'()-=^|@`]{;+:*[},<.>/? ";

        $decriptedString = [];
        for ($i = 0 ; $i < strlen($encriptedMessage) ; $i++) {
            $currentKey = $key[$i % strlen($key)];
            $currentLetter = $encriptedMessage[$i];
            $ck = strpos($VigString, $currentKey);
            $cl = strpos($VigString, $encriptedMessage[$i]);
            $decriptedLetter = $VigString[($cl - $ck) % strlen($VigString)];
            array_push($decriptedString, $decriptedLetter);
        }
        $decriptedString = implode($decriptedString);
        echo $decriptedString;
    }
?>