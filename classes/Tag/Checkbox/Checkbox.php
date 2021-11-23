<?php

class Checkbox extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', '1');
    }

    public function __toString()
    {
        return parent::open();
    }
}
