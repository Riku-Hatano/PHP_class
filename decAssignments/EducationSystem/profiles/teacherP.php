<?php
include dirname(__FILE__)."/../pages/header.php";
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}
?>

<div class="row justify-content-start align-items-start g-2">
    <div class="col-5">
        <div class="card text-start">
          <div class="card-body">
            <?php
              echo "<h4 class='card-title'>".$_SESSION['logUser']['first_name']." ".$_SESSION['logUser']['last_name']."</h4>";
              echo "<p class='card-text'>".$_SESSION['logUser']['id']."</p>";
              echo "<p class='card-text'>".$_SESSION['logUser']['email']."</p>";  
            ?>
          </div>
          <div class="card text-start">
          <select name="html">HTML</select>
            <select name="css">CSS</select>
            <select name="javascript">JavaScript</select>
            <select name="javascriptA">JavaScript Advance</select>
            <select name="php">PHP</select>
            <select name="cms">CMS</select>
          </div>
        </div>
    </div>
    <div class="col-7">Column</div>
</div>
