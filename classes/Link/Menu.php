<?php
# своеобразное меню
include 'Link.php';
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
    </style>

<?php
echo '<div class="menu">';
echo (new Link())->setText('Главная')->setAttr('href', "/codemu/classes/Link/page1.php");
echo (new Link())->setText('Статьи')->setAttr('href', "/codemu/classes/Link/page2.php");
echo (new Link())->setText('Новости')->setAttr('href', "/codemu/classes/Link/page3.php");
echo (new Link())->setText('Войти')->setAttr('href', "/codemu/classes/Link/page4.php");
echo (new Link())->setText('Справочная информация')->setAttr('href', "/codemu/classes/Link/page5.php");


//for ($i=0; $i<5; $i++) {
//    $l = new Link();
//    if ($i === 0) {
//        $link = '/';
//    } else {
//        $link = $i . '.php';
//    }
//    $l->setText("Кнопка номер $i")->setAttr('href', "/codemu/classes/Link/page$link") ;
//    echo $l ;
//}
echo '</div>';
