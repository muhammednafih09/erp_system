<?php
require_once "Department.php";

class User
{
    public function __construct(
        public ?int $id,
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $phoneNumber,
        public ?string $pass,
        public string $userType,
        public ?Department $department,
        public Bool $active
    ) {
    }

    public function toArray(){
        return [
            "id"=>$this->id,
            "firstName"=>$this->firstName,
            "lastName"=>$this->lastName,
            "email"=>$this->email,
            "phoneNumber"=>$this->phoneNumber,
            "pass"=>$this->pass,
            "userType"=>$this->userType,
            "department"=>$this->department->toArray(),
            "active"=>$this->active
        ];
    }

    public static function fromArray($userArray){
        return new self(
            $userArray["id"],
            $userArray["firstName"],
            $userArray["lastName"],
            $userArray["email"],
            $userArray["phoneNumber"],
            $userArray["pass"],
            $userArray["userType"],
            Department::fromArray($userArray["department"]),
            $userArray["active"]
        );
    }

    public function create(MyDB $db)
    {
        $hashpass = password_hash($this->pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `tbl_users`( `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`, `active`) 
                VALUES ('" . $this->firstName . "','" . $this->lastName . "','" . $this->email . "','" . $this->phoneNumber . "','$hashpass','" . $this->userType . "', " . $this->active . ")";

        $db->runSQL($sql);

        $this->id = $db->lastInsertedRowId();
    }

    public function update(MyDB $db){
        $sql = "UPDATE `tbl_users` SET `first_name`='".$this->firstName."',`last_name`='".$this->lastName."',`email`='".$this->email."',`phone_number`='".$this->phoneNumber."',`password`='".$this->pass."',`user_type`='".$this->userType."',`department`='".$this->department->id."',`active`='".$this->active."' WHERE id = ".$this->id;

        $db->runSQL($sql);
    }

    public static function getAll(MyDB $db)
    {
        $users = $db->getRows("SELECT * FROM tbl_users WHERE active = 1");
        $userObjs = [];
        foreach ($users as $user) {
            array_push($userObjs, new self($user["id"], $user["first_name"], $user["last_name"], $user["email"], $user["phone_number"], null, $user["user_type"], Department::getOne($db, $user['department']), $user["active"]));
        }
        return $userObjs;
    }

    public function getProfilePicUrl()
    {
        return $this->id . ".png";
    }

    public static function getUserTypeFromSession()
    {
        return self::getUserFromSession()->userType;
    }

    public static function getUserById(int $id, MyDB $db)
    {
        $user = $db->getOneRow("SELECT * FROM tbl_users WHERE id = $id");
        $userObj = new self(
            $user['id'],
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            $user['phone_number'],
            $user['password'],
            $user['user_type'],
            Department::getOne($db, $user['department']),
            $user['active']
        );

        return $userObj;
    }

    public static function getUserByEmail(string $email, MyDB $db){
        $user = $db->getOneRow("SELECT * FROM tbl_users WHERE email = '$email'");
        if(!$user){
            return null;
        }
        $userObj = new self(
            $user['id'],
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            $user['phone_number'],
            $user['password'],
            $user['user_type'],
            Department::getOne($db, $user['department']),
            $user['active']
        );

        return $userObj;
    }

    public static function getUserFromSession()
    {
        if(!array_key_exists('user', $_SESSION)){
            return null;
        }
        return self::fromArray($_SESSION['user']);
    }

    public static function isUserLoggedIn()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return array_key_exists('user', $_SESSION);

        // if(array_key_exists('user', $_SESSION)){
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
