<?php
/*
 * Класс для инпута типа Hidden
 * */
class Hidden extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'hidden');
    }
}