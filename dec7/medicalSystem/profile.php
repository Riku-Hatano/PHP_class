<?php include './pages/header.php'; ?>

<div class="container-fluid">
    <div class="row justify-content-start align-items-start g-2">
        <div class="col-4">
            <div class="card border-primary" style="width: 40%;">
              <img class="card-img-top"  src="<?php echo $_SESSION['logUser']['img']?>" alt="Logo">
              <div class="card-body">
                <h4 class="card-title">
                    <?php
                        echo $_SESSION['logUser']['fname']." ".$_SESSION['logUser']['lname'];
                    ?>
                </h4>
                <p class="card-text">Speciality: <?php echo $_SESSION['logUser']['spec']; ?></p>
              </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?php
            if(isset($_GET['msg'])) echo "block";
            else echo "none";
            ?> ;">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>Message</strong> <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>
            
            <form method="POST" action="<?php echo $baseName.'patUpload.php';?>" enctype="multipart/form-data">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control" name="patname" placeholder="sds">
              <label for="formId1">Patient Name</label>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose file</label>
              <input type="file" class="form-control" name="patimg" id="" placeholder="" aria-describedby="fileHelpId">
              <div id="fileHelpId" class="form-text">Help text</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include './pages/footer.php'; ?>