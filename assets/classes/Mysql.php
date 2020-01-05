<?php


class Mysql{

    public $connect;

    public function __construct($database, $host = 'localhost', $root = 'root', $password = ''){
        $this->connect = mysqli_connect($host, $root, $password, $database);
        mysqli_set_charset($this->connect, 'utf8');
    }

}