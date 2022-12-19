<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $randLength = mt_rand(10, 15);
        $fileName = [];
        for ($i = 0 ; $i < $randLength ; $i++) {
            array_push($fileName, $letters[mt_rand(0, count($letters) - 1)]);
        }
        //from line 2 to 8, i made the file whose name is random.
        $fileName = 'VegEnc'.'='.implode($fileName);

        $note = $_POST['note'];
        $key = $_POST['key'];
        $message = $_POST['message'];

        $VigString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&'()-=^|@`]{;+:*[},<.>/? ";
        //define the table of Vigenere here.

        $encriptedString = [];
        for ($i = 0 ; $i < strlen($message) ; $i++) {
            $currentKey = $key[$i % strlen($key)];
            //by using "%", if the length of message was bigger than key, "%" make key loop.
            $currentLetter = $message[$i];
            //currentLetter is $i th letter of $message.
            $ck = strpos($VigString, $currentKey);
            //checking the where the $currentKey located on the $VigString. by turning out the number.
            $cl = strpos($VigString, $message[$i]);
            //same as $ck.
            $encriptedLetter = $VigString[($cl + $ck) % strlen($VigString)];
            //to add $ck to $cl, we can change the letter. if $ck is 0 and $cl is 10, the $encriptedLetter will be i. 
            array_push($encriptedString, $encriptedLetter);
            //finish the encription of one letter. 
        }
        $encriptedString = implode($encriptedString);
        //turning array into string without any letter of space.

        $newJsonArray = [
            "note" => $note,
            "key" => $key,
            "message" => $encriptedString,
            "fileName" => $fileName
        ];
        $file = fopen("./files/$fileName.txt", "w");
        fwrite($file, $encriptedString);
        fclose($file);
        //writing note, key, encripted message, and filename to json file. 

        if (!file_exists('./path.json')) {
            $fileInfoArray = [];
            $file = fopen('./path.json', 'w');
            array_push($fileInfoArray, $newJsonArray);
            fwrite($file, json_encode($fileInfoArray));
            fclose($file);
            //make file and write something if there were no files in specific path.
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
            //if there was json file, i got the content and add new information on that file. 
        }
        header('Location: '.'./index.php?msg=message is successfully sent!!!');
    }
?>