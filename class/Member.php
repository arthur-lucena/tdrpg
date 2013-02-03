<?php
class Member {
    private $id;
    private $user;
    private $passwd;
    private $email;
    private $regIp;
    private $dtCreate;

    public function getId() {
        return $this -> id;
    }

    public function setId($id) {
        $this -> id = $id;
    }

    public function getUser() {
        return $this -> user;
    }

    public function setUser($user) {
        $this -> user = $user;
    }

    public function getPasswd() {
        return $this -> passwd;
    }

    public function setPasswd($passwd) {
        $this -> passwd = $passwd;
    }

    public function getEmail() {
        return $this -> email;
    }

    public function setEmail($email) {
        $this -> email = $email;
    }

    public function getRegIp() {
        return $this -> regIp;
    }

    public function setRegIp($regIp) {
        $this -> regIp = $regIp;
    }

    public function getDtCreate() {
        return $this -> dtCreate;
    }

    public function setDtCreate($dtCreate) {
        $this -> dtCreate = $dtCreate;
    }

    public function getJsonData() {
        $var = get_object_vars($this);

        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value, 'getJsonData')) {
                $value = $value -> getJsonData();
            }
        }
        return $var;
    }

}
?>