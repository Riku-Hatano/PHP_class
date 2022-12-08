<?php include './pages/header.php'; ?>
<div class="row justify-content-center align-items-center g-2">
    <div class="col-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?php
            if(isset($_GET['msg'])) echo "block";
            else echo "none";
        ?> ;">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>Alert </strong> username/password not found!
        </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>
        
        <form method="POST" action="<?php echo $baseName.'log.php'; ?>">
        <div class="mb-3">
         
          <select class="form-select form-select-lg" name="role">
            <option value="tech">Teacher</option>
            <option value="st" selected>Student</option>
          </select>
        </div>
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control" name="email" placeholder="cd" required>
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control" name="pass" placeholder="cd" required>
          <label for="pass">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
</div>
<?php include './pages/footer.php'; ?>