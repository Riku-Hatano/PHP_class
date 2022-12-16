<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $randLength = mt_rand(10, 15);
        $fileName = [];
        for ($i = 0 ; $i < $randLength ; $i++) {
            array_push($fileName, $letters[mt_rand(0, count($letters) - 1)]);
        }
        $fileName = implode($fileName);

        $note = $_POST['note'];
        $key = $_POST['key'];
        $message = $_POST['message'];

        $VigString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&'()-=^|@`]{;+:*[},<.>/? ";
        // $VigArray = str_split($VigString, 1);

        $encriptedString = [];
        for ($i = 0 ; $i < strlen($message) ; $i++) {
            $currentKey = $key[$i % strlen($key)];
            $currentLetter = $message[$i];
            $ck = strpos($VigString, $currentKey);
            $cl = strpos($VigString, $message[$i]);
            $encriptedLetter = $VigString[($cl + $ck) % strlen($VigString)];
            array_push($encriptedString, $encriptedLetter);
            // echo "<h3>$cl : $ck : $encriptedLetter</h3>";
        }
        $encriptedString = implode($encriptedString);

        $newJsonArray = [
            "note" => $note,
            "key" => $key,
            "message" => $encriptedString,
            "fileName" => $fileName
        ];
        $file = fopen("./files/$fileName.txt", "w");
        fwrite($file, $encriptedString);
        fclose($file);

        if (!file_exists('./path.json')) {
            $fileInfoArray = [];
            $file = fopen('./path.json', 'w');
            array_push($fileInfoArray, $newJsonArray);
            fwrite($file, json_encode($fileInfoArray));
            fclose($file);
        } else {
            $file = fopen('./path.json', 'r');
            $jsonArray = fread($file, filesize('./path.json'));
            $decodedArray = json_decode($jsonArray, true);
            $fileInfoArray = $decodedArray;
            array_push($fileInfoArray, $newJsonArray);
            fclose($file);
            $file = fopen('./path.json', 'w');
            fwrite($file, json_encode($fileInfoArray));
            fclose($file);
        }
        header('Location: '.'./index.php?msg=message is successfully sent!!!');
    }
?>