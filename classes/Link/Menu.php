<?php
# своеобразное меню
include '../Tag/Link/Link.php';
?>
    <style>
        .menu {
            width: 53%;
            margin: 0 auto;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #99a9af;
            padding: 5px;
            box-shadow: #2A333D 1px 1px;
        }
        .menu a {
            text-decoration: none;
            display: inline-block;
            width: 200px;
            color: white;
            font-family: "GT Eesti Pro Display Medium", sans-serif;
        }
        .menu a:hover {
            color: #abc1d7;
        }
        a.active-menu {
            color: yellow;
        }
    </style>

<?php
echo '<div class="menu">'
. (new Link())->setText('Главная')->setAttr('href', "/codemu/classes/pages/page1.php")
. (new Link())->setText('Статьи')->setAttr('href', "/codemu/classes/pages/page2.php")
. (new Link())->setText('Новости')->setAttr('href', "/codemu/classes/pages/page3.php")
. (new Link())->setText('Войти')->setAttr('href', "/codemu/classes/pages/page4.php")
. (new Link())->setText('Справочная информация')->setAttr('href', "/codemu/classes/pages/page5.php")
    .'</div>';

//echo $_SERVER['REQUEST_URI'];