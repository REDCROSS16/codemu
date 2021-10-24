<?php
include '../db/db.php';

function checkPage ($url) {
    $db = connect();
    $query = "SELECT COUNT(*) as count FROM pages WHERE url = '$url'";
    $res = mysqli_query($db, $query);
    $isPage = mysqli_fetch_assoc($res)['count'];
    return (bool)$isPage;
}