<?php
$files = ['1.php', '2.php', '3.php'];
foreach ($files as $file) {
    include $file;
}
//include 'file.php';
echo '<h1> include testing</h1>';

//$str = file_get_contents('http://www.onliner.by');
var_dump($str);