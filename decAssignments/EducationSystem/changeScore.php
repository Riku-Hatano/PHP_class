<?php include dirname(__FILE__)."/pages/header.php"; ?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        if($_POST["score"] > 0 && $_POST["score"] <= 100 || $_POST["score"]=="0"){
            //postから送信されて来る値は文字列
            //intに変更しようとするとゼロになってしまう
            //使おうと思えば使える解決策。。。コンディションにゼロを含める。ただし生徒の点数がゼロにできなくなる。
            $newScore = $_POST["score"];
            $stID = $_POST["id"];
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
            echo "illegal score";
            header("Location: ".$baseName."/profiles/teacherP.php");
        }
    } else {
        echo "illegal request method!!";
    }
?>
<?php include dirname(__FILE__)."/pages/footer.php"; ?>
