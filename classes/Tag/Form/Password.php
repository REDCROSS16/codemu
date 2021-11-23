<?php

class Password extends Input
{
    public function __construct($name)
    {
        parent::__construct();
        $this->setAttr('type', 'password');
        $this->setAttr('name', $name);
    }
}
