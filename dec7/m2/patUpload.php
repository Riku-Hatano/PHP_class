<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $patName = $_POST['patname'];
        $patimg = $_FILES['patimg'];
        if(!is_dir('./data/patimages/'.$patName)){   
            mkdir('./data/patimages/'.$patName);
        }
        $targetDir = "./data/patimages/$patName/";
        if($patimg['size']<400000){
            if($patimg['type']=="image/jpeg" || $patimg['type']=="image/jpg"){
                if(move_uploaded_file($patimg['tmp_name'],$targetDir.$patimg['name'])){
                    header("Location: ".$baseName."profile.php?msg=uploaded");
                    exit();
                }
            }
        }
    }
?>
