<?php
//include '../Tag/Tag.php';

class HtmlList extends Tag
{
    private $items = [];

    public function addItem(listItem $li)
    {
        $this->items[] = $li;
        return $this;
    }

    public function show()
    {
        $result = $this->open();

        foreach ($this->items as $li) {
            $result .= $li->show();
        }
        $result .= $this->close();
        return $result;
    }
}