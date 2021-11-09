<?php
    session_start();
    session_destroy();
    $title = 'Logout page';
    include 'elems/head.php';
    echo '<p class="success">You are successfully logout</p>';