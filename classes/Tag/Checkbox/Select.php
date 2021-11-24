<?php

class Select extends Tag
{
    private $options = [];
    public function __construct()
    {
        parent::__construct('select');
    }

    public function add(Option $option)
    {
         $this->options[] = $option;
         return $this;
    }

    public function show()
    {
        $result = parent::open();

        foreach ($this->options as $option) {
            $result .= $option;
        }

        $result .= parent::close();
        return $result;
    }
}