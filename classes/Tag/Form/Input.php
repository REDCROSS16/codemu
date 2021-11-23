<?php

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function __toString()
    {
        return parent::open();
    }

    public function open()
    {
        $inputName = $this->getAttr('name'); // имя инпут

        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }
        return parent::open(); // вызываем метод open родителя
    }
}