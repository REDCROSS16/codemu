<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();

const HOST1 = 'localhost';
const USER1 = 'root';
const PASSWORD1 = 'root';
const DB_NAME1 = 'test_16';

function connect () {
    return mysqli_connect(HOST1, USER1, PASSWORD1, DB_NAME1);
}
