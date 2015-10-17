<?php

    class Users extends DAO {
        public function __construct($db) {
            parent::__construct($db, TBL_PEOPLE);
        }
    }

?>