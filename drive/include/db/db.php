<?php

const HOST1 = 'localhost';
const USER1 = 'root';
const PASSWORD1 = 'root';
const DB_NAME1 = 'test_16';


function connect ($host, $user, $password, $db_name) {
    $db = mysqli_connect($host, $user, $password, $db_name);
    return $db;
}
