<?php
    class logService{
        private $uid;
        private $titleArray = ['login','logout','register','login attempt','password change','default password change'];
        private $title;
        private $action;
        private $date;
        function __construct($uid,$titleIdx,$action,$date)
        {
            $this->uid = $uid;
            $this->title = $this->titleArray[$titleIdx];
            $this->action = $action;
            $this->date = $date;
        }
        function logToArray(){
            $fields = ['uid','title','action','date'];
            $values = [$this->uid,$this->title,$this->action,$this->date];
            return [$fields,$values];
        }
    }
?>