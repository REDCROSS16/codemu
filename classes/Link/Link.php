<?php
include '../Tag/Tag.php';

class Link extends Tag
{
    public function __construct()
    {
        parent::__construct('a');
        $this->setAttr('href', '');
    }

    public function __toString()
    {
        return parent::open() . parent::getText() . parent::close();
    }
}


