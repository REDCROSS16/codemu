<?php
include '../Tag/Tag.php';

// класс для создания HTML изображения!
class Image extends Tag
{
    public function __construct($text = '', $attrs = [])
    {
        parent::__construct('img', $text, $attrs);
        $this->setAttr('src','');
        $this->setAttr('alt','');
    }

    public function __toString()
    {
        return parent::open();
    }
}

$image = new Image();
echo $image->setAttr('src','https://img5.goodfon.ru/wallpaper/big/8/43/derevia-peizazh-gory-priroda-ozero-ssha-lesa-natsionalnyi-pa.jpg')->open();

$image2 = new Image();
echo '<br>';
echo $image2->setAttr('width', '600px')->setAttr('height', '400px')->setAttr('src', 'https://images.noob-club.ru/news/2021/11/615/v4rcwfpgjr.jpg');
echo $image2;


$solder = new Image();
$solder->setAttr('src', 'https://cdn0.iconfinder.com/data/icons/military-6/44/solder-256.png')->setAttr('width', '20px')->setAttr('height','20px');

for ($i = 0; $i < 100; $i++) {
    if ($i % 10 === 0) {
        echo '<br>';
    }
    echo $solder;
}
