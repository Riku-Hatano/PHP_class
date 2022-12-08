<?php include './pages/header.php'; ?>
<?php
    $medid = $_GET["medid"];

    $file = fopen("./data/data.txt", "r");
    $data = fread($file, filesize("./data/data.txt"));
    $decoded = json_decode($data, true);
    fclose($file);
    // print_r($decoded);
    $fname;
    $lname;
    $img;
    $id;
    $spec;
    foreach($decoded as $eachData) {
        foreach($eachData as $value) {
            if($eachData["id"] == $medid) {
                $fname = $eachData["fname"];
                $lname = $eachData["lname"];
                $img = $eachData["img"];
                $id = $eachData["id"];
                $spec = $eachData["spec"];
                break;
            }
        }
    }
?>
<?php
    echo "<h3>".$fname." ".$lname."</h3>";
    echo "<img src='$img' width=200px height=200px>";
    echo "<h4>specialized at $spec</h4>";
    echo "<h4>medID is $id</h4>";

?>
<?php include './pages/footer.php'; ?>