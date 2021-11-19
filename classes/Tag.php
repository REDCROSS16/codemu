<?php
// Клас
class Tag
{
    private $name;
    private $text;

    public function __construct ($name, $text,  $attrs = []) {
        $this->name = $name;
        $this->text = $text;
        $this->attrs = $attrs;
    }

    // открывающаяся часть тега
    public function open()
    {
        $name = $this->name;
        $attributes = $this->getAttrString($this->attrs);
        return "<$name $attributes>";
    }

    // закрывающая часть тега
    public function close() {
        $name = $this->name;
        return "</$name>";
    }

    // Формируем строку с атрибутами:
    private function getAttrString($attrs)
    {
        if (!empty($attrs)){
            $result = '';

            foreach ($attrs as $name => $value) {
                $result .= "$name=\"$value\"";
            }
            return $result;
        } else {
            return '';
        }
    }

    public function setAttr($name, $value)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

//    public function create()
//    {
//        echo $this->open() . $this->text . $this->close();
//    }
}

//$div = new Tag('div', 'hello world', ['class' => 'block']);
//$div->create();
//
//$header = new Tag('header', 'Тестирование класса Tag', ['class' => 'header']);
//$header->create();
//
//$img = new Tag('img', 'Картинка', ['class' => 'block-img abc']);
//$img->create();
//
$h3 = new Tag('h3', 'Обычный заголовок третьего уровня!');
echo $h3->setAttr('class', 'blocked')->open() . 'Заголовок' . $h3->close();
