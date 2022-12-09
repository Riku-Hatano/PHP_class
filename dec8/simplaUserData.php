<?php
    function loadData($filename) {
        $file = fopen("data/simpleProducts/$filename.json", "r");
        $data = fread($file, filesize("data/simpleProducts/$filename.json"));
        $decodedData = json_decode($data, true);
        return $decodedData;
    }
    $users = loadData("simpleuserData");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table of names</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($users as $user) {
                    echo "<tr>";
                        foreach($user as $element) {
                            echo "<td>$element</td>";
                        }
                        // $pathWithQ = $_SERVER["PHP_SESLF"]?fname=$user["first_name"]&lname=$user["last_name"];
                        echo "<a href='$pathWithQ'>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>