<?php
    class student{
        private $stID;
        private $fname;
        private $lname;
        private $email;
        private $pass;
        function __construct($stID,$fname,$lname,$email,$pass)
        {
            $this->stID = $stID;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->pass = $pass;
        }  
        function convert_info(){
            return ["stID"=>$this->stID,"fname"=>$this->fname,"lname"=>$this->lname,"email"=>$this->email,"pass"=>$this->pass];
        }      
    }
?>