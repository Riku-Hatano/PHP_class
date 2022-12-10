<?php
    include './pages/header.php';
?>
<div class="row justify-content-center align-items-center g-2">
    <div class="col-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?php 
            if(isset($_GET['msg'])) echo "block";
            else echo "none";
        ?> ;">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>Message</strong> <?php
          if(isset($_GET['msg'])) echo $_GET['msg'];
           ?>
        </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>
        
        <form method="POST" action="<?php echo $baseName.'reg.php'; ?>">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control" name="stid" placeholder="xc" required>
              <label for="formId1">Student ID</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control" name="fname" placeholder="xc" required>
              <label for="formId1">First Name</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control" name="lname" placeholder="xc" required>
              <label for="formId1">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control" name="email" placeholder="xc" required>
              <label for="formId1">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control" name="pass" placeholder="xc" required>
              <label for="formId1">Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
    </form>
    </div>
</div>
<?php
    include './pages/footer.php';
?>