<?php
    class logService{
        private $uid;
        private $titleArray = ['login','logout','register','login attempt','password change','default password change'];
        private $title;
        private $action;
        private $date;
        function __construct($uid,$titleIdx,$action)
        {
            $this->uid = $uid;
            $this->title = $this->titleArray[$titleIdx];
            $this->action = $action;
            $date = getdate();
            $dateVal = $date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
            $this->date = $dateVal;
        }
        function logToArray(){
            $fields = ['uid','title','action','date'];
            $values = [$this->uid,"'$this->title'","'$this->action'","'$this->date'"];
            return [$fields,$values];
        }
    }
?>