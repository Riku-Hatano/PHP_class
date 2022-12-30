<?php include './pages/header.php'; ?>
<div class="row justify-content-center align-items-start g-2 mt-2">
    <div class="col-6">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="mb-3">
            <select class="form-select form-select-lg" name="role">
                <option selected disabled>Select Role</option>
                <option value="0">Student</option>
                <option value="1">Teacher</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control" name="email" placeholder="ftgf">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control" name="pass" placeholder="fg">
          <label for="pass">Password</label>
        </div>
        <button type="submit" class="btn btn-outline-primary">Login</button>
    </form>
    </div>
</div>
<?php
 if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = intval($_POST['role']);
     include './services/dbservices.php';
     include './services/logservice.php';
     $dbService = new dbServices($hostName,$userName,$password,$dbName);
     if($dbcon = $dbService->dbConnect()){
         $result = $dbService->select('user_tb',['email'=>"'$email'",'pass'=>"'$pass'",'role'=>"$role"],'AND');
         if($result->num_rows > 0){
            // print_r($result->fetch_assoc());
            $user = $result->fetch_assoc();
            $_SESSION['logUser'] = $user;
            $logSrv = new logService($user['uid'],0,"User Login");
            $logOutput = $logSrv->logToArray();
            $dbService->insert('log_tb',$logOutput[1],$logOutput[0]);
            $logResult = $dbService->select('log_tb',['uid'=>$user['uid'],'title'=>"'default password change'"],"AND");
            if($logResult->num_rows == 0){
                $dbService->closeDb();
                header("Location: ".$baseName."chpass.php");
                exit();


            }
         }
         
         
     }
 }
?>
<?php include './pages/footer.php'; ?>