<?php

class Connection {
    
    var $db;

    function __construct() {
        $this->db = new SQLite3('../data/data.db');
    }
}