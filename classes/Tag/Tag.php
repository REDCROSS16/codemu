<?php

include 'iTag.php';

class Tag implements iTag
{
    private $name;
    private $text;

    public function __construct ($name, $text = '',  $attrs = []) {
        $this->name = $name;
        $this->text = $text;
        $this->attrs = $attrs;
    }

    // возвращаем название тега
    public function getName()
    {
        return $this->name;
    }

    // возвращаем текст тега
    public function getText()
    {
        return $this->text;
    }

    // возвращаем массив атрибутов
    public function getAttributes()
    {
        return $this->attrs;
    }

    public function getAttr($name)
    {
        if (isset($this->attrs[$name])) {
            return $this->attrs[$name];
        }
        return null;
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
                if ($value === true) {
                    $result .= " $name ";
                } else {
                    $result .= "$name=\"$value\"";
                }

            }
            return $result;
        } else {
            return '';
        }
    }

    // добавляет аттрибут для HTML тега
    public function setAttr($name, $value=true)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    // удаляет аттрибут для HTML тега
    public function removeAttr($name)
    {
        if (array_key_exists($name, $this->attrs)) {
            unset($this->attrs[$name]);
        }
        return $this;
    }

    // добавляет массив аттрибутов для HTML тега
    public function setAttributes($array)
    {
        foreach ($array as $name=>$value)  {
            $this->setAttr($name, $value);
        }
        return $this;
    }

    // добавляет класс к тегу HTML
    public function addClass($className) {
        if (isset($this->attrs['class'])){
            $classNames = explode(' ', $this->attrs['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attrs['class'] = $className;
        }
        return $this;
    }
    // удаляет класс
    public function removeClass ($className)
    {
        // 1. проверяем есть ли такой массив
        if (isset($this->attrs['class'])) {
            // 2.разбиваем атрибуты с классом и записываем в переменную
            $classNames = explode(' ', $this->attrs['class']);

            // 3. если в массиве есть нужный для удаления то удаляем
            if (in_array($className, $classNames)) {
                $classNames = $this->removeElement($className, $classNames);
                $this->attrs['class'] = implode('', $classNames);
            }
        }
        return $this;
    }

    // вспомогательный метод для удаления элементов с массива
    private function removeElement($elem, $arr)
    {
        $key = array_search($elem, $arr);
        array_splice($arr,$key,1);
        return $arr;
    }

    // Открывающий тег, текст и закрывающий тег:
    public function show()
    {
        return $this->open() . $this->text . $this->close();
    }

    // Установка текста:
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
}

# EXAMPLES
//$h3 = new Tag('h3', 'Обычный заголовок третьего уровня!');
//echo $h3->setAttr('class', 'blocked')
//        ->removeAttr('class')
//        ->setAttr('data-name', 'tested')
//        ->setAttributes(['data-time' => '22.00', 'data-up'=>'23.00'])
//        ->open()
//    . 'Заголовок'
//    . $h3->close();
//
//
//$input = new Tag('input', '123');
//echo $input->setAttributes(['disabled' => true, 'id'=> 'i-3'])->addClass('open')->addClass('door')->open();
//
//
//echo (new Tag('input'))
//    ->setAttr('class', 'eee bbb')
//    ->setAttr('id', 'i-4')
//    ->setAttr('name','i_4')
//    ->addClass('kkk')->open();
//
//$submit = new Tag('input');
//echo $submit->setAttr('value', 'Отправить данную форму')->setAttr('type', 'submit')->open();
//
//echo (new Tag('input'))
//    ->addClass('eee')
//    ->addClass('bbb')
//    ->addClass('eee')// такой класс уже есть и не добавится
//    ->setAttr('disabled', true)
//    ->removeClass('bbb')
//    ->removeClass('eee')
//    ->open();
