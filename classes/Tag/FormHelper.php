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

    // checkbox
    public function checkbox (array $attrs = []) : string
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;

        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $attrs['checked'] = true;
            }
            $hidden = $this->hidden(['name' => $name, 'value' => 0]); 
        } else {
            $hidden = '';
        }

        return $hidden . $this->open('input', $attrs);
    }

    /**
     * Метод для создания тега TEXTAREA
     * */
    public function textArea(array $attrs = [], string $text) : string
    {
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name])) {
                $text = $_REQUEST[$name];
            }
        }
        return $this->open('textarea', $attrs) . $text . $this->close('textarea');
    }

    /**
     * Метод для создания тега SELECT
     * */
    public function select(array $selectAttrs = [], array $optionAttrs = []) : string
    {
        $options = '';

        foreach ($optionAttrs as $optionAttr) {
            $options .= $this->open('option', $optionAttr['attrs']) . $optionAttr['text'] . $this->close('option') ;
        }

        return $this->open('select', $selectAttrs) . $options . $this->close('select');
    }
}



$fh = new FormHelper();
	
	echo $fh->openForm(['action' => '', 'method' => 'GET']);
	echo $fh->textArea(['name' => 'message'], 'abcdefg');
	echo $fh->checkbox(['name' => 'c-1']);
	echo $fh->submit(['name' => 'submit']);

	echo $fh->closeForm();

//
$fh2 = new FormHelper();
echo $fh2->openForm(['action' => '', 'method' => 'GET']);
echo $fh2->select(
    ['name' => 'list', 'class' => 'eee'],
    [
        ['text' => 'item1', 'attrs' => ['value' => '1']],
        ['text' => 'item2', 'attrs' => ['value' => '1', 'selected' => true]],
        ['text' => 'item1', 'attrs' => ['value' => '1', 'class' => 'last']],
        ['text' => 'Витебск', 'attrs' => ['value' => 'Vitebsk', 'class' => 'last']],
        ['text' => 'Витебск', 'attrs' => ['value' => 'Vitebsk', 'class' => 'last']],
    ]
);

echo $fh2->select();

var_dump($_REQUEST['list']);

echo $fh2->submit();
echo $fh2->closeForm();