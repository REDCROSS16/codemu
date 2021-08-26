<?php

function createLink($href, $text) {

    if ($_SERVER['REQUEST_URI'] == $href) {
        $class = 'class="active"';
    } else {
        $class = '';
    }
    echo "<a href=\"$href\" $class>$text</a>";
}
//createLink('/codemu/drive/include/', 'Main');
//createLink('/codemu/drive/include/?page=about', 'About');
//createLink('/codemu/drive/include/?page=contacts', 'Contacts');

$query = 'SELECT * FROM pages';
$result = mysqli_query($db, $query);

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

foreach ( $data as $page) {
    if ($page['url'] == '404') continue;
    createLink('/codemu/drive/include/?page=' . $page['url'], $page['text']);
}

?>