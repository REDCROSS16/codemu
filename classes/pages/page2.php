<?php
include '../Link/Menu.php';
include '../Tag/Checkbox/Checkbox.php';
include '../Tag/Form/Form.php';
include '../Tag/Form/Input.php';
include '../Tag/Form/Submit.php';
include '../Tag/Form/Password.php';
include '../Tag/Form/Hidden.php';
include '../Tag/Form/Textarea.php';
echo '<h1 style="text-align: center">Статьи</h1>';
$checkbox = new Checkbox();



$form = (new Form)->setAttributes([
    'action' => '',
    'method' => 'GET'
]);

echo $form->open();
echo (new Checkbox)->setAttr('name', 'checkbox');
echo (new Input)->setAttributes(['name'=> 'user']);
echo new Submit;
echo $form->close();