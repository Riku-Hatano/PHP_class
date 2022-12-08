<?php include './pages/header.php'; ?>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-4">
              <div style="display: <?php 
                if(isset($_GET['s'])) echo "block";
                else echo "none";
               ?>;" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success</strong> Doctor Registered
              </div>
              
              <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function (alert) {
                  new bootstrap.Alert(alert)
                })
              </script>
              
                <form method="post" action="<?php echo $baseName."reg.php"; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="" class="form-label"><label for="" class="form-label">Select your image</label>
                    </label>
                      <input type="file" class="form-control" name="logoimg" placeholder="Select your image" aria-describedby="fileHelpId">
                      <div id="fileHelpId" class="form-text">Help text</div>
                    </div>
                    <div class="form-floating mb-3">
                      <input
                        type="text"
                        class="form-control" name="medid" placeholder="name">
                      <label for="formId1">Medical Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                          type="text"
                          class="form-control" name="fname" placeholder="name">
                        <label for="formId1">First Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input
                          type="text"
                          class="form-control" name="lname" placeholder="name">
                        <label for="formId1">Last Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input
                          type="password"
                          class="form-control" name="pass" placeholder="name">
                        <label for="formId1">Password</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input
                          type="text"
                          class="form-control" name="spec" placeholder="name">
                        <label for="formId1">Speciality</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <?php include './pages/footer.php'; ?>