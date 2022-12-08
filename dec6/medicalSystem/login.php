<?php
    // 1. Check the req method and redirect to login [*]
    // 2. Open and read the data.txt and load the data []
    // 3. get the medid and pass.
    // 4. loop through the array of users and comapre the medid and pass
    include './data/config.php';    
    if($_SERVER["REQUEST_METHOD"]!="POST"){
        header("Location: ".$baseName."index.php");
        exit();
    }else{
        if(file_exists('./data/data.txt')){
            $medid = $_POST['medid'];
            $pass = $_POST['pass'];
            $file = fopen('./data/data.txt','r');
            $data = fread($file,filesize('./data/data.txt'));
            fclose($file);
            $users = json_decode($data,true);
            print_r($users);
            foreach($users as $user){
                if($user['id']==$medid && $user['pass']==$pass){
                    print_r($user);
                    header("Location: ".$baseName."pats.php?medid=$medid");
                    // header("Location: ".$_SERVER['PHP_SELF']."?picurl=$dstPath&picurl2=$srcPath");

                    break;
                }
            }
        }else{
            header("Location: ".$baseName."regform.php");
            exit();
        }
    }

?>