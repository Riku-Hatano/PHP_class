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
    function update($tbName,$updateFields, $conditionArray, $operator=null){
        $updateFieldStr = "";
        foreach($updateFields as $field=>$val){
            $updateFieldStr .= "$field=$val";
            if($field!=array_key_last($updateFields)){
                $updateFields .= ",";
            }
        }
        $where = "WHERE ";
        foreach($conditionArray as $key=>$value){
            $where .= "$key=$value";
            if($key!=array_key_last($conditionArray)){
                $where .= " $operator ";
            }
        }
        $updateQuery = "UPDATE $tbName SET $updateFieldStr $where";
        if($this->dbcon->query($updateQuery)===TRUE){
            return true;
        }else{
            return false;
        }
    }
    function select($tbName,$conditionArray=null,$operator=null,$fieldArray=null){
        if($fieldArray!=null){
            $fields = implode(',',$fieldArray);
        }else{
            $fields = "*";
        }
        if($conditionArray!=null){
            $where = "WHERE ";
            foreach($conditionArray as $key=>$value){
                $where .= "$key=$value";
                if($key!=array_key_last($conditionArray)){
                    $where .= " $operator ";
                }
            }
        }else{
            $where = '';
        }
        $selectCmd = "SELECT $fields FROM $tbName $where";
        $result = $this->dbcon->query($selectCmd);        
        return $result;
    }
}
?>





<!-- SELECT テーブル1から抽出するカラム
FROM 基準にしたいテーブル1の名前
JOIN 結合させたいテーブル2の名前
ON テーブル1の名前.基準にするカラム名 = テーブル2の名前.基準にするカラム名; -->
<!-- SELECT  * FROM monthly_sales JOIN employee_name_entry_year ON monthly_sales.id = employee_name_entry_year.id; -->



<!-- select
   *
from
   テーブル1 as o  /* テーブル1を oに置き換え */
inner join
   テーブル2 as d  /* テーブル2を dに置き換え */
on o.id = od.order_id
inner join
   テーブル3 as p  /* テーブル3を pに置き換え */
on d.product_id = p.id; -->
<!-- 複数 -->

<!-- スクショ　command+shift+3 -->



