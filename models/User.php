<?php

class User
{
    public function __construct(
        public int $id,
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $phoneNumber,
        public string $pass,
        public string $userType,
        public Bool $active
    ) {
        
    }

    public function getProfilePicUrl()
    {
        return $this->id.".png";
    }

    public static function getUserTypeFromSession(){
        return $_SESSION['user']['user_type'];
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
            $user['active']
        );

        return $userObj;
    }

    public static function getUserFromSession()
    {
        $userObj = new self(
            $_SESSION['user']['id'],
            $_SESSION['user']['first_name'],
            $_SESSION['user']['last_name'],
            $_SESSION['user']['email'],
            $_SESSION['user']['phone_number'],
            $_SESSION['user']['password'],
            $_SESSION['user']['user_type'],
            $_SESSION['user']['active'],
        );
        return $userObj;
    }

    public static function isUserLoggedIn()
    {
        if(!isset($_SESSION)){
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
