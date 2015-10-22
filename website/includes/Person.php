<?php

class Person extends People {
    protected $db;
    private $email;
    private $first_name;
    private $last_name;
    private $id;
    private $roleId;
    private $points;
    private $auth;
    public function __construct(Database $db = NULL){
        $this->db = $db;
        parent::__construct($db);
        $this->removeAllValues();
    }
    public function changeDB($db){
        $this->db = $db;
    }
    public function login($email, $password){//Returns TRUE if valid login creditals, false otherwise.
        $return = false;
        $this->db->execute("SELECT * FROM ".TBL_PEOPLE." WHERE email = '".$email."'"); //See if that given email is in the DB.
        if($this->db->numRows() > 0){ //Email found..
            $result = $this->db->fetchRow();
            if(parent::makePassword($password) === $result['password']){//Check passwords return the results..
                $this->id = $result['id'];
                $this->email = $result['email'];
                $this->first_name = ucfirst($result['first_name']);
                $this->last_name = ucfirst($result['last_name']);
                $this->points = $result["points"];
                $this->roleId = $result["role_id"];
                $this->auth = true;
                $return = true;
            }
        }
        return $return;
    }
    protected function logout(){
        $this->removeAllValues();
        return false;
    }
    /* Get Functions */
    public function id(){
        return $this->id;
    }
    public function email(){
        return $this->email;
    }
    public function first_name(){
        return $this->first_name;
    }
    public function last_name(){
        return $this->last_name;
    }
    public function points() {
        return $this->points;
    }
    public function role() {
        return $this->roleId;
    }
    public function isAuth(){
        return $this->auth;
    }
    public function makePassword($password){
        return parent::makePassword($password);
    }
    public function register($email, $first_name, $last_name, $password_A, $password_B){
        return parent::register($email, $first_name, $last_name, $password_A, $password_B);
    }
    public function editInfo($id, $current_values, $email, $first_name, $last_name, $password_A, $password_B){
        return parent::editInfo($id, $current_values, $email, $first_name, $last_name, $password_A, $password_B);
    }
    //This function inserts the parameters into the database under the table people, the fields should be valid before passing..
    /* Update Functions */
    //These functions return true or false if they updated the DB
    private function removeAllValues(){
        $this->email = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
        $this->id = -1;
        $this->points = -1;
        $this->roleId = -1;
        $this->auth = false;
    }
    //to call this function just echo the object. Example:
    //$person = new Person();
    //echo $person;
    //Output: James Little (or FirstName LastName)
    public function __toString(){
        return $this->first_name()." ".$this->last_name();
    }
}
?>