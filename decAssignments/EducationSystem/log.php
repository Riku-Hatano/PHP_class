<?php
    include './data/config.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        switch($_POST["role"]) {
            case "tech":
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $file = fopen('./data/teachers/teachers.json','r');
                $stArray = json_decode(fread($file,filesize('./data/teachers/teachers.json')),true);
                foreach($stArray as $tech){
                    if($tech['email']==$email && $tech['pass']==$pass){
                        $_SESSION['logUser'] = $tech;
                        print_r($tech);
                        header("Location: ".$baseName.'profiles/teacherP.php');
                        exit();
                        break;
                    }
                }
                header("Location: ".$baseName.'index.php?msg=1');
                break;

            case "st":
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $file = fopen('./data/students/students.json','r');
                $stArray = json_decode(fread($file,filesize('./data/students/students.json')),true);
                foreach($stArray as $st){
                    if($st['email']==$email && $st['pass']==$pass){
                        $_SESSION["logUser"] = $st;
                        header("Location: ".$baseName.'profiles/studentP.php');
                        exit();
                        break;
                    }
                }
                header("Location: ".$baseName.'index.php?msg=1');
                break;

            case "admin":
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $file = fopen('./data/admins/admins.json','r');
                $stArray = json_decode(fread($file,filesize('./data/admins/admins.json')),true);
                foreach($stArray as $tech){
                    if($tech['email']==$email && $tech['pass']==$pass){
                        $_SESSION['logUser'] = $tech;
                        print_r($tech);
                        header("Location: ".$baseName.'profiles/adminP.php');
                        exit();
                        break;
                    }
                }
                header("Location: ".$baseName.'index.php?msg=1');
                break;
            
            default:
                echo "post key is illegal!!";
        }
    }
?>