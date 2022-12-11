<?php include dirname(__FILE__)."/pages/header.php"; ?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $newScore = $_POST["score"];
        $stID = $_POST["id"];
        // print_r($_SESSION["logUser"]);
        $path = $_SESSION["logUser"]["class"];
        $file = fopen("./courses/$path/$path.json", "r");
        $data = fread($file, filesize("./courses/$path/$path.json"));
        $decodedData = json_decode($data, true);
        fclose($file);
        foreach($decodedData as $key => $eachData){
            if($eachData["stID"]==$stID){
                $decodedData[$key]["score"] = $newScore;
                $file = fopen("./courses/$path/$path.json", "w");
                fwrite($file, json_encode($decodedData));
                fclose($file);
                break;
            }
        }
        header("Location: ".$baseName."/profiles/teacherP.php");
    } else {
        echo "illegal request method!!";
    }
?>
<?php include dirname(__FILE__)."/pages/footer.php"; ?>
