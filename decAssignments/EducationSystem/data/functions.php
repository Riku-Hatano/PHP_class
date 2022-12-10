<?php
    function readData($userType, $fileName){
        $file = fopen("./data/$userType/$fileName.json", "r");
        $data = fread($file, filesize("./data/$userType/$fileName.json"));
        $decodedData = json_decode($data,true);
        return $decodedData;
    }

    
?>