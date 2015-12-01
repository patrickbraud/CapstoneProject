<?php

class Role extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_ROLES);
    }

    function add($roleName) {
        return $this->db->execute("INSERT INTO ".$this->table." (name) VALUES ('".$roleName."')");
    }

    function update($id, $roleName) {
        return $this->db->execute("UPDATE ".$this->table." SET name = '".$roleName."' WHERE id = '".$id."'");
    }

    function getAdminRole() {
        return ADMIN_ROLE;
    }

    function getUserRole() {
        return USER_ROLE;
    }

    function getStaffRole() {
        return STAFF_ROLE;
    }

    private function isRole($roleId, $comparedRoleId) {
        return $roleId == $comparedRoleId;
    }

    function isAdmin($roleId) {
        return $this->isRole($roleId, $this->getAdminRole());
    }

    function isUser($roleId) {
        return $this->isRole($roleId, $this->getUserRole());
    }

    function isStaff($roleId) {
        return $this->isRole($roleId, $this->getStaffRole());
    }

    function getRoleName($roleId) {
        $s = "";
        if($this->isAdmin($roleId)) $s =  "Admin";
        else if($this->isStaff($roleId)) $s = "Faculty";
        else if($this->isUser($roleId)) $s = "User";
        else $s = "Guest";
        return $s;
    }

}