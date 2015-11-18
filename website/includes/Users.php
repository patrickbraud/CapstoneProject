<?php

    class Users extends DAO {
        public function __construct($db) {
            parent::__construct($db, TBL_PEOPLE);
        }

        public function update($id, $firstName, $lastName, $email, $roleId) {
            $this->db->update($this->table, "first_name = '$firstName', last_name = '$lastName', email = '$email', role_id = $roleId", "id = $id");
        }
    }

?>