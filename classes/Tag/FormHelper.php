<?php
include 'TagHelper.php';

class FormHelper extends TagHelper
{
    public function openForm(array $attrs = []) : string
    {
        return $this->open('form', $attrs);
    }

    public function closeForm() : string
    {
        return $this->close('form');
    }

    /**
     * @author Red
     *  html input
     */
    public function input (array $attrs = []) : string
    {
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name])) {
                $attrs['value'] = $_REQUEST[$name];
            }
        }
        return $this->open('input', $attrs);
    }

    public function password(array $attrs = []) : string
    {
        $attrs['type'] = 'password';
        return $this->open('password', $attrs);
    }

    public function hidden(array $attrs = []) : string
    {
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }

    public function submit(array $attrs = []) : string
    {
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }

    public function checkbox (array $attrs = []) : string
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;

//        if (isset($attrs['name'])) {
//            $name = $attrs['name'];
//        }
    }
}
