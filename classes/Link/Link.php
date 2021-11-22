<?php
include '../Tag/Tag.php';

class Link extends Tag
{

    const ACTIVE_CLASS = 'active-menu';
    public function __construct()
    {
        parent::__construct('a');
        $this->setAttr('href', '');
    }

    public function __toString()
    {
        return $this->open() . parent::getText() . parent::close();
    }

    private function activateSelf()
    {
        if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
            $this->addClass(self::ACTIVE_CLASS);
        }
    }

    // Переопределяем метод родителя:
    public function open()
    {
        $this->activateSelf(); // вызываем активацию
        return parent::open(); // вызываем метод родителя
    }
}


