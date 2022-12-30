<?php
class dbServices{
    private $hostName;
    private $userName;
    private $password;
    private $dbName;
    private $dbcon;
    function __construct($hostName,$userName,$password,$dbName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
    }
    function dbConnect(){
        $dbcon = new mysqli($this->hostName,$this->userName,$this->password,$this->dbName);
        if($dbcon->connect_error){
            return false;
        }
        $this->dbcon = $dbcon;
        return $dbcon;
    }
    function closeDb(){
        $this->dbcon->close();
    }
    function insert($tbName,$valuesArray,$fieldArray=null){
        if($fieldArray!=null){
            $fields = "(".implode(',',$fieldArray).")";
        }else{
            $fields = '';
        }
        $values = implode(',',$valuesArray);
        $insertCmd = "INSERT INTO $tbName $fields VALUES ($values)";
        if($this->dbcon->query($insertCmd) === TRUE){
            return true;
        }
        return false;
    }
    function select($tbName, $fname, $data){
        // var_dump($fname);
        // var_dump($fname['fname']);
        // $ffname = $fname['fname'];
        $mysqlCmd = "SELECT * FROM $tbName WHERE role='1'";
        $value = $this->dbcon->query($mysqlCmd);
        $value2 = $value->fetch_assoc();
        // var_dump($value);
        print_r($value);
        print_r($value2);
        // echo "<p>$tbName</p>";
        // print_r($fname);
        // print_r($data);
        // print_r($this->dbcon);
        // return $value;
    }
}
?>