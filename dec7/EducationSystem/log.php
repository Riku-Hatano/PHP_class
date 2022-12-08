<?php
    include './data/config.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $file = fopen('./data/students/students.json','r');
        $stArray = json_decode(fread($file,filesize('./data/students/students.json')),true);
        foreach($stArray as $st){
            if($st['email']==$email && $st['pass']==$pass){
                $_SESSION['logUser'] = $st;
                header("Location: ".$baseName.'profile.php');
                exit();
                break;
            }
        }
        header("Location: ".$baseName.'index.php?msg=1');
        exit();
    }
?>