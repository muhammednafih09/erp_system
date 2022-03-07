<?php

class MyDB{
    private $db;
    
    public function __construct(string $db_name = "erp_system")
    {
        $this->db = new PDO("mysql:host=localhost;dbname=$db_name", 'root', '', [pdo::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION]);
    }

    function getRows(string $sql){
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getOneRow(string $sql) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    function runSQL(string $sql){
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    function lastInsertedRowId(){
        return $this->db->lastInsertId();
    }
}

?>