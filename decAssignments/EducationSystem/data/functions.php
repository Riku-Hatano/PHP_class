<?php
    function readData($userType, $fileName){
        $file = fopen(dirname(__FILE__)."/$userType/$fileName.json", "r");
        // $file = fopen("./$userType/$fileName.json", "r");
        $data = fread($file, filesize(dirname(__FILE__)."/$userType/$fileName.json"));
        // $data = fread($file, filesize("./$userType/$fileName.json"));
        $decodedData = json_decode($data,true);
        return $decodedData;
    }
?>