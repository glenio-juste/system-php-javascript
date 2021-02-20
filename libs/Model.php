<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public static function UUID()
    {
        return md5(uniqid(rand(), true));
    }

}