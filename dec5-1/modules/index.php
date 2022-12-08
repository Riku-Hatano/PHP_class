<!-- @include  -->
<?php
    class doctor{
        public $firstName;
        public $lastName;
        public $dob;
        public $speciality;
        public $medID;
        public $password;
        // public $weight = 0;
        // public $height = 0;
        function __construct($firstName, $lastName, $dob, $speciality, $medID)
        // function __construct($firstName, $lastName, $dob, $speciality, $medID, $weight, $height)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dob = $dob;
            $this->speciality = $speciality;
            $this->medID = $medID;
            // $this -> weight = $weight;
            // $this -> height = $height;
            
        }
        function show_info(){
            return ["fname"=>$this->firstName,"lname"=>$this->lastName,"dob"=>$this->dob,"spec"=>$this->speciality,"id"=>$this->medID];
        }
    }

    class subDoctor extends doctor {
        function hello() {
            return "hello".$this -> firstName;
        }
        // function construct() {
        //     parent::__construct();
        // }
    }

    $doctor1 = new doctor ("riku", "hatano", "1999/08/22", "dirmatology", 1192, 177, 80);
    $doctor2 = new doctor ("masashi", "nakamura", "1994/11/10", "cardio", 1185, 175, 65);
    $doctor3 = new subDoctor ("takeshi", "ogata", "1968/09/22", "neuro", 1919, 190, 90);
   
    $doctors = [$doctor1, $doctor2, $doctor3];
    echo $doctors[2] -> hello();
    
?>

<table border="1">
    <?php
        echo "<thead>";
            echo "<th>first name</th>";
            echo "<th>last name</th>";
            echo "<th>dob</th>";
            echo "<th>speciality</th>";
            echo "<th>medID</th>";
            echo "<th>w</th>";
            echo "<th>h</th>";
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
