<?php 
include './pages/header.php';
$patimages = scandir('./data/patimages');
?>
<div class="container-fluid">
    <div class="row justify-content-start align-items-start g-2">
        <div class="col-3">
            <!-- Hover added -->
            <div class="list-group">
                <?php
                    foreach($patimages as $dirName){
                        if($dirName=="." || $dirName=="..") continue;
                        echo "<a href='".$_SERVER['PHP_SELF']."?name=$dirName' class='list-group-item list-group-item-action'>$dirName</a>";
                    }
                ?>
            </div>
        </div>
        <div class="col-9">
            <?php
                // if(isset($_GET['name'])){
                //     echo $_GET['name'];
                //     // print_r($patimages);
                //     foreach($patimages as $pat) {
                //         if ($pat == "." || $pat == "..") {
                //             continue;
                //         } else {
                //             if ($_GET["name"] == $pat) {
                //                 $src = scandir("./data/patimages/$pat");
                //                 foreach ($src as $eachSrc) {
                //                     if($eachSrc == "." || $eachSrc == "..") {
                //                         continue;
                //                     } else {
                //                         echo "<img src='./data/patimages/$pat/$eachSrc'>";
                //                         echo "<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">";
                //                         echo "<div class="carousel-inner">";
                //                                     <div class="carousel-item active">
                //                                     <img class="d-block w-100" src="..." alt="First slide">
                //                                     </div>
                //        
                //                         echo "</div>";
                //                         echo "</div>";
                //                     }
                //                 }
                //             }
                //         }
                //     }
                // }
                if(isset($_GET['name'])){
                    echo $_GET['name'];
                    foreach($patimages as $pat) {
                        if ($pat == "." || $pat == "..") {
                            continue;
                        } else {
                            if ($_GET["name"] == $pat) {
                                $src = scandir("./data/patimages/$pat");
                                foreach ($src as $eachSrc) {
                                    if($eachSrc == "." || $eachSrc == "..") {
                                        continue;
                                    } else {
                                        echo "<img src='./data/patimages/$pat/$eachSrc' width=200px height=200px>";
                                        // echo "<img src='./data/patimages/$pat/$eachSrc' width=200px height=200px>";
                                    
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
    
    
    ?>
<?php 
    include './pages/footer.php';
    ?>