<?php

class Department{
    public function __construct(
        public int $id,
        public string $name,
        public string $head
    ){
        
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
        return new self(
            $department['id'],
            $department['name'],
            $department['head']
        );
    }
}

?>