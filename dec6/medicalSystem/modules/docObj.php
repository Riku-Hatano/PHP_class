<?php
    class doctor{
        private $firstName;
        private $lastName;
        private $pass;
        private $speciality;
        private $medID;
        private $imgurl;
        function __construct($firstName, $lastName, $pass, $speciality, $medID,$imgurl)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->pass = $pass;
            $this->speciality = $speciality;
            $this->medID = $medID;
            $this->imgurl = $imgurl;
        }
        function show_info(){
            return ["id"=>$this->medID,"fname"=>$this->firstName,"lname"=>$this->lastName,"pass"=>$this->pass,"spec"=>$this->speciality,"img"=>$this->imgurl];
        }
        function json_output(){
            return json_encode($this->show_info());
        }
    }
?>