<?php
    class student {
        public $fname;
        public $lname;
        public $stID;
        public $score;
        function __construct($fname, $lname, $stID, $score) 
        {
            $this -> fname = $fname;
            $this -> lname = $lname;
            $this -> stID = $stID;
            $this -> score = $score;
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $id = $_POST["id"];
        $class = $_POST["class"];
        if(!is_dir("./courses/$class")) {
            mkdir("./courses/$class", 0777);
            chmod("./courses/$class", 0777);
        }
        if(!file_exists("./courses/$class/$class.json")) {
            $file = fopen("./courses/$class/$class.json", "w");
            $stFile = fopen("./data/students/students.json", "r");
            $stData = fread($stFile, filesize("./data/students/students.json"));
            $decodedData = json_decode($stData, true);
            $pushArray = [];
            foreach($decodedData as $student){
                if($student["stID"]==$id){
                    array_push($pushArray, new student($student["fname"], $student["lname"], $student["stID"], 0));
                    break;
                }
            }
            fclose($stFile);
            fwrite($file, json_encode($pushArray));
            fclose($file);
        }else{
            $file = fopen("./courses/$class/$class.json", "r");
            $stData = fread($file, filesize("./courses/$class/$class.json"));
            $decodedData = json_decode($stData, true);
            $pushArray = $decodedData;
            fclose($file);
            //既にある生徒の情報を配列に入力

            $file = fopen("./data/students/students.json", "r");
            $stData = fread($file, filesize("./data/students/students.json"));
            $decodedData = json_decode($stData, true);
            fclose($file);
            $classFile = fopen("./courses/$class/$class.json", "r");
            $classData = fread($classFile, filesize("./courses/$class/$class.json"));
            $decodedClassData = json_decode($classData, true);
            fclose($classFile);
            foreach($decodedData as $student){
                if($student["stID"]==$id){
                    foreach($decodedClassData as $existID){
                        if($existID["stID"]==$id) {
                            echo "this student is already exists";
                            return;
                        }   
                    }
                    array_push($pushArray, new student($student["fname"], $student["lname"], $student["stID"], 0));
                    $file = fopen("./courses/$class/$class.json", "w");
                    fwrite($file, json_encode($pushArray));
                    fclose($file);
                    break;
                }
            }
            print_r($pushArray);

            // $file = fopen("./courses/$class/$class.json", "w");
            // fwrite($file, json_encode($pushArray));
            // fclose($file);
            // header("Location: ".)
        }
    }
?>