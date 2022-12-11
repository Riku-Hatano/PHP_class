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
            <form method="POST" action="http://localhost:8080/Dec/decAssignments/Educationsystem/profiles/teacherP.php">
              <select name="class">
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="javascript">JavaScript</option>
                <option value="javascriptadv">JavaScript Advance</option>
                <option value="php">PHP</option>
                <option value="cms">CMS</option>
              </select>
              <input type="submit" value="select class">
            </form>
          </div>
          <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
              $class = $_POST["class"];
              echo "<h4>$class is selected</h4>";
              echo "<form action='../changeScore.php' method='POST'>";
                echo "<select name='id'>";
                  $file = fopen("../courses/$class/$class.json", "r");
                  $data = fread($file, filesize("../courses/$class/$class.json"));
                  $decodedData = json_decode($data, true);
                  foreach($decodedData as $data){
                    $sendId = $data["stID"];
                    echo "<option value=$sendId>".$data["fname"]." ".$data["lname"]." ".$data["stID"]." ".$data["score"]."</option>";
                  }
                  echo "</ol>";
                  fclose($file);
                  echo "<input type='text' name='score'>";
                  echo "<input type='submit' value='change score'>";
                  $_SESSION["logUser"]["class"] = $class;

                echo "</select>";
              echo "</form>";
            } else {
              echo "select the class!!";
            }
          ?>
        </div>
    </div>
    <div class="col-7">
      <ol>
        <?php
          if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($decodedData == false){
              echo "no student data yet!!";
            } else {
              foreach($decodedData as $data){
                $sendId = $data["stID"];
                echo "<li>".$data["fname"]." ".$data["lname"]." ".$data["stID"]." ".$data["score"]."</li>";
              }
            }
          }
        ?>
      </ol>
    </div>
</div>
