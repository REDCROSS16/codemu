<?php

class Submit extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'submit');
    }
}