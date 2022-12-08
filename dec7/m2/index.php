<?php include './pages/header.php'; ?>

<main>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-4">
                <form method="POST" action="<?php echo $baseName.'login.php'; ?>">
                    <div class="form-floating mb-3">
                      <input
                        type="text"
                        class="form-control" name="medid" placeholder="er">
                      <label for="medid">Medical Number</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input
                        type="password"
                        class="form-control" name="pass" placeholder="er">
                      <label for="medid">Password</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>                
            </div>
        </div>
    </div>
</main>
    
<?php include './pages/footer.php'; ?>