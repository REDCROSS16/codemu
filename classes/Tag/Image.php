<?php
include 'Tag.php';

class Image extends Tag
{

}

$image = new Image('img');
echo $image->setAttr('src','https://img5.goodfon.ru/wallpaper/big/8/43/derevia-peizazh-gory-priroda-ozero-ssha-lesa-natsionalnyi-pa.jpg')->open();