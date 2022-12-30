<?php 
    include './services/dbservices.php';
    include './services/jsonService.php';
    include './config.php';
    $jsonSrv = new jsonService('./data/users.json');
    $data = $jsonSrv->jsontoArray();
    $dbSrv = new dbServices($hostName,$userName,$password,$dbName);
    if($dbSrv->dbConnect()){
        foreach($data as $json){
            $fields = [];
            $values = [];
            foreach($json as $key=>$val){
                array_push($fields,$key);
                if($key == "uid" || $key == "role"){
                    array_push($values,$val);
                }else{
                    array_push($values,"'$val'");
                }
            }
            if($dbSrv->insert('user_tb',$values,$fields)){
                echo "added";
            }else{
                echo "not added";
            }
        }
    }else{
        echo "problem";
    }
?>