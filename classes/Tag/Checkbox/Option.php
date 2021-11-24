<?php

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    public function __toString()
    {
        return parent::open() . parent::getText() . parent::close();
    }

    public function setSelected()
    {
        $this->setAttr('selected', 'true');
        return $this;
    }
}
