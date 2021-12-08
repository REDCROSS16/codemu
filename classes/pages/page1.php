<?php
include '../Link/Menu.php';
include '../Tag/HtmlList/HtmlList.php';
include '../Tag/HtmlList/ListItem.php';
include '../Tag/HtmlList/Ol.php';
include '../Tag/HtmlList/Ul.php';
include '../CookieShell/CookieShell.php';

echo '<h1 style="text-align: center">It\'s main page</h1>';

$list = new HtmlList('ol');

$listOfItems = [
    'Список1',
    'Список2',
    'Список3',
    'Список4',
    'Список5',
    'Список6',
    ];

//foreach ($listOfItems as $li) {   
//    $list->addItem((new ListItem())->setText($li));
//}
//
//echo $list->show();


$ol = new Ol();
$ul = new Ul();

foreach ($listOfItems as $li) {
    $ol->addItem((new ListItem())->setText($li));
    $ul->addItem((new ListItem())->setText($li));
}

echo $ol->show();
echo $ul->show();