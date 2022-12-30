<?php include './pages/header.php'; ?>
<div class="row justify-content-center align-items-start g-2 mt-3">
    <div class="col-5">
        <form>
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control" name="email" placeholder="email" required>
              <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control" name="pass" placeholder="pass" required>
              <label for="email">Password</label>
            </div>
            <button type="submit" class="btn btn-outline-success">Login</button>
        </form>
    </div>
</div>
<?php include './pages/footer.php'; ?>