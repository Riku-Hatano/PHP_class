<?php
    class jsonService{
        private $fileDir;
        function __construct($fileDir)
        {
            $this->fileDir = $fileDir;
        }
        function reading(){
            $file = fopen($this->fileDir,'r');
            $data = fread($file,filesize($this->fileDir));
            fclose($file);
            return $data;
        }
        function jsontoArray(){
            $data = $this->reading();
            return json_decode($data,true);
        }
        function arraytoFile($data){
            $data = json_encode($data);
            $this->writing($data);
        }
        function writing($data){
            $file = fopen($this->fileDir,'w');
            fwrite($file,$data);
            fclose($file);
        }
    }
?>