<?php


class TagHelper
{
    public function open($name, $attrs = [])
    {
        $attrsStr = $this->getAttrStr($attrs);
        return "<$name$attrsStr>";
    }

    public function close($name)
    {
        return "</$name>";
    }

    private function getAttrStr($attrs)
    {
        if (!empty($attrs)) {
            $result = '';
            foreach ($attrs as $name => $value) {
                if ($value === true) {
                    $result .= " $name";
                } else {
                    $result .= " $name=\"$value\"";
                }
            }
            return $result;
        } else {
            return '';
        }
    }

    public function show($tagName, $text)
    {
        return $this->open($tagName) . $text . $this->close($tagName);
    }
}

$th = new TagHelper();
echo $th->open('div', [
    'class' => 'new',
    'id' => 'fff',
]);
echo $th->close('div');


$th = new TagHelper();

echo $th->open('form', ['action' => 'test.php', 'method' => 'GET']);
echo $th->open('input', ['name' => 'year']);
echo $th->open('input', ['type' => 'submit']);
echo $th->close('form');

echo (new TagHelper)->show('h4', 'HEllo this is TagHelper');