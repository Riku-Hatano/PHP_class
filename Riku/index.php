<?php
    class doctor{
        public $firstName;
        public $lastName;
        public $dob;
        public $speciality;
        public $medID;
        function __construct($firstName, $lastName, $dob, $speciality, $medID)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dob = $dob;
            $this->speciality = $speciality;
            $this->medID = $medID;
        }
        function show_info(){
            return ["fname"=>$this->firstName,"lname"=>$this->lastName,"dob"=>$this->dob,"spec"=>$this->speciality,"id"=>$this->medID];
        }
    }

    $doctor1 = new doctor ("riku", "hatano", "1999/08/22", "dirmatology", 1192);
    $doctor2 = new doctor ("masashi", "nakamura", "1994/11/10", "cardio", 1185);

    // $doctors[] = array_push($doctor1, $doctor2);
    $doctors[0] = $doctor1;
    $doctors[1] = $doctor2;
    
?>

<table border="1">
    <?php
        echo "<thead>";
            echo "<th>first name</th>";
            echo "<th>last name</th>";
            echo "<th>dob</th>";
            echo "<th>speciality</th>";
            echo "<th>medID</th>";
        echo "</thead>";
        echo "<tbody>";
            for($i = 0 ; $i < count($doctors) ; $i++) {
                echo "<tr>";
                    foreach($doctors[$i] as $value) {
                        echo "<td>$value</td>";
                    }
                echo "</tr>";
            }
        echo "</tbody>";
    ?>
</table>
