<?php include './config.php'; 

$file = fopen('./contactlist.json','r');
$data = fread($file,filesize('./contactlist.json'));
echo $data;
fclose($file);
$file = fopen('./ivs.dat','r');
$ivdata = fread($file,filesize('./ivs.dat'));
$ivdata = explode(",",$ivdata);
fclose($file);
$data = openssl_decrypt($data,$cipher_alog,$key,0,$ivdata[0],$ivdata[1]);

//でクリプトができてない
$data = json_decode($data,true);
if($_SERVER['REQUEST_METHOD']=="POST"){
    foreach($data[$_POST['idx']] as $key=>$val){
        if($key=="id") continue;
        $data[$_POST['idx']][$key] = $_POST[$key];
    }
    $ivlen = openssl_cipher_iv_length($cipher_alog);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $stringData = json_encode($data);
    $enc = openssl_encrypt($stringData,$cipher_alog,$key,0,$iv,$tag);
    $ivdata = [$iv,$tag];
    $file = fopen('./ivs.dat',"w");
    fwrite($file,implode(',',$ivdata));
    fclose($file);
    $file = fopen('./contactlist.json','w');
    fwrite($file,$enc);
    fclose($file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-start g-2">
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table table-striped
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                        <thead class="table-light">
                            <caption>Table Name</caption>
                            <tr>
                                <th>Full name</th>
                                <th>Phone</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                <?php
                // $data = openssl_decrypt($data,$cipher_alog,$key,0,$ivdata[0],$ivdata[1]);
                // $data2 = json_decode($data, true);
                // print_r($data2);
                // echo "<p>$data2</p>";
                // print_r(openssl_decrypt($data,$cipher_alog,$key,0,$ivdata[0],$ivdata[1]));
                echo "<p>$data</p>";
                echo "<p>$cipher_alog</p>";
                echo "<p>$key</p>";
                echo "<p>$ivdata[0]</p>";
                echo "<p>$ivdata[1]</p>";
                // echo "<p>$ivdata[2]</p>";
                foreach($data as $key=>$val){
                    echo "<tr class='table-primary' >";
                    echo "<td>".$val['first_name']." ".$val['last_name']."</td>";
                    echo "<td>".$val['phone']."</td>";
                    echo "<td><a href='".$_SERVER['PHP_SELF']."?id=$key'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-8">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php
                        if(isset($_GET['id'])){
                            $selectedUser = $data[$_GET['id']];
                            echo "<input type='hidden' name='idx' value='".$_GET['id']."'/>";
                            foreach($selectedUser as $key=>$val){
                                if($key == "id") continue;
                                if($key=="email"){
                                    echo "<input type='email' name='$key' value='$val'/>";
                                    continue;
                                };
                                echo "<input name='$key' value='$val'/>";
                            }
                            echo "<button type='submit'>Edit</button>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>