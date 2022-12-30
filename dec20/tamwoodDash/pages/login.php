<div class="row justify-content-center align-items-start g-2">
    <form method="POST" action="<?php echo $baseName."?t=lg" ?>">
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control" name="email" placeholder="xs" required>
          <label for="pass">email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="pass" placeholder="xs" required>
          <label for="pass">password</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>