<?php include './pages/header.php'; ?>
<?php 
    if(isset($_GET['p'])){
        include './pages/'.$_GET['p'].'.php'; 
    }else{
        include './pages/home.php'; 
    }
    if(isset($_GET['t'])){
    switch($_GET['t']){
        case "chp":
            $pass = $_POST['pass'];
            $pass = password_hash($pass,PASSWORD_DEFAULT);
            $dbcon = new mysqli($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
            if($dbcon->connect_error){
                echo "connection error";
            }else{
                $updateCmd = "UPDATE user_tb SET pass = '$pass' WHERE uid=120456";
                $result = $dbcon->query($updateCmd);
                if($result===TRUE){
                    echo "updated";
                }else{
                    echo $dbcon->error;
                }
                $dbcon->close();
            };
            break;
        case "lg":
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $dbcon = new mysqli($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
            if($dbcon->connect_error){
                echo "connection error";
            }else{
                $select = "SELECT * FROM user_tb WHERE email='$email'";
                $result = $dbcon->query($select);
                // var_dump($result);
                // var_dump($result->fetch_assoc());
                if($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    // var_dump($user);
                    echo"<p>pass: $pass</p>";
                    echo"<p>user-pass: ".$user['pass']."</p>";
                    if(password_verify($pass,$user['pass'])){
                        echo "user found";
                    }else{
                        echo "user not found!!";    
                    }
                }else{
                    echo "user not found";
                }
                $dbcon->close();
            };
            break;
        
    }
        
    }
?>
<?php include './pages/footer.php'; ?>