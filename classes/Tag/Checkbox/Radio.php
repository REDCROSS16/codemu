<?php

class Radio extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
        $this->setAttr('type', 'radio');
    }

    public function __toString()
    {
        return $this->open();
    }

    public function open()
    {
        $name = $this->getAttr('name');
        $radioValue = $this->getAttr('value');
        // Реализуем теперь сохранение состояния радиобатона после отправки формы
        if (isset($_REQUEST[$name])) {
            $value = $_REQUEST[$name];
            if ($value == $radioValue) {
                $this->setAttr('checked');
            } else {
                $this->removeAttr('checked');
            }
        }
        return parent::open();
    }
}