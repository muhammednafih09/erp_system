<?php

use JetBrains\PhpStorm\Deprecated;

class Department{
    public function __construct(
        public int $id,
        public string $name,
        public string $head
    ){
        
    }

    public function toArray(){
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "head"=>$this->head
        ];
    }

    public static function fromArray($deptArray){
        return new self(
            $deptArray["id"],
            $deptArray["name"],
            $deptArray["head"]
        );
    }

    public static function getAll(MyDB $db){
        $departments = $db->getRows("SELECT * FROM tbl_departments");
        $deptObjs = [];
        foreach($departments as $department){
            array_push($deptObjs, new self($department["id"], $department["name"], $department["head"]));
        }
        return $deptObjs;
    }

    public static function getOne(MyDB $db, int $id){
        $department = $db->getOneRow("SELECT * FROM tbl_departments WHERE id = $id");
        if(!$department){
            return null;
        }
        return new self(
            $department['id'],
            $department['name'],
            $department['head']
        ); 
    }
}

?>