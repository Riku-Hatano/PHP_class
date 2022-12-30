<?php include './pages/header.php'; ?>
<div class="row justify-content-center align-items-start g-2">
    <div class="col-6">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control" name="pass1" placeholder="sd">
              <label for="pass1">New Password</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control" name="pass2" placeholder="sd">
              <label for="pass2">Confirm Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</div>
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $pass = $_POST['pass1'];
        include './services/dbservices.php';
        $dbSrv = new dbServices($hostName,$userName,$password,$dbName);
        if($dbcon = $dbSrv->dbConnect()){
            $pass = password_hash($pass,PASSWORD_DEFAULT);
            $uid = $_SESSION['logUser']['uid'];
            if($dbSrv->update('user_tb',['pass'=>"'$pass'"],['uid'=>"$uid"])){
              echo "Password updated";
            }else{
              echo "Password not updated";
            }

        }
        
    }
?>
<?php include './pages/footer.php'; ?>