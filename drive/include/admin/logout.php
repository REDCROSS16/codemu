<?php
    session_start();
    session_destroy();
    $title = 'Logout page';
    include 'elems/head.php';
    echo '<p class="success">You are successfully logout</p>';
?>
<ul class="nav">
    <li class="nav-item">
        <a href="login.php"><button class="btn btn-primary">Login</button></a>
    </li>
    <li class="nav-item">
        <a href="../index.php"><button class="btn btn-primary">Main page</button></a>
    </li>
    <li class="nav-item">
        <a href="#"><button class="btn btn-primary">reserv</button></a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
    </li>
</ul>