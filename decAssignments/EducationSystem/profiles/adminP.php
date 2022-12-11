<?php
include dirname(__FILE__)."/../pages/header.php";
include dirname(__FILE__)."/../data/functions.php";
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}
?>

<div class="row justify-content-start align-items-start g-2">
    <div class="col-5" display>
      <div class="card text-start">
        <div class="card-body">
          <?php
            echo "<h4 class='card-title'>".$_SESSION['logUser']['fname']." ".$_SESSION['logUser']['lname']."</h4>";
            echo "<p class='card-text'>".$_SESSION['logUser']['id']."</p>";
            echo "<p class='card-text'>".$_SESSION['logUser']['email']."</p>";  
          ?>
        </div>
        <div class="card card-body">
          <form method="POST" action="../addClass.php">
            <select class="form-select form-select-lg" name="id">
              <?php
              $students = readData("students", "students");
                foreach($students as $student){
                  $value = $student["stID"];
                  echo 
                  "<option value=$value>
                    ".$student["fname"]." ".$student["lname"]. ": ".$value."
                  </option>";
                }
                ?>
            </select>
            <select name="class" class="form-select form-select-lg" required>
              <option value="html">HTML</option>
              <option value="css">CSS</option>
              <option value="javascript">JavaScript</option>
              <option value="javascriptadv">JavaScript Advance</option>
              <option value="php">PHP</option>
              <option value="cms">CMS</option>
            </select>
            <input type="submit" value="submit">
          </form>
        </div>
      </div>
    </div>
</div>
