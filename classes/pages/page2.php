<?php
include '../Link/Menu.php';
include '../Tag/Checkbox/Checkbox.php';
include '../Tag/Checkbox/Radio.php';
include '../Tag/Checkbox/Select.php';
include '../Tag/Checkbox/Option.php';
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
    echo (new Checkbox)->setAttr('name', 'remember');
    echo (new Checkbox)->setAttr('name', 'autocommit');
    echo (new Checkbox)->setAttr('name', 'check');
    echo (new Input)->setAttributes(['name'=> 'user']);
    echo new Submit;


    echo (new Radio)->setAttr('name', 'radio-1')->setAttr('value', 'r-1');
    echo (new Radio)->setAttr('name', 'radio-1')->setAttr('value', 'r-2');
    echo (new Radio)->setAttr('name', 'radio-1')->setAttr('value', 'r-3');

    echo (new Radio)->setAttr('name', 'radio-2')->setAttr('value', 'r-4');
    echo (new Radio)->setAttr('name', 'radio-2')->setAttr('value', 'r-5');
    echo (new Radio)->setAttr('name', 'radio-2')->setAttr('value', 'r-6');

echo $form->close();


echo (new Select)->setAttr('name', 'list')
		->add( (new Option())->setText('Витебск') )
    ->add( (new Option())->setText('Гомель')->setAttr('value', 'Homel') )
    ->add( (new Option())->setText('Минск')->setAttr('value', 'Minsk')->setSelected() )
    ->add( (new Option())->setText('Гродно')->setAttr('value', 'Grodno') )
    ->add( (new Option())->setText('Могилев')->setAttr('value', 'Mogilev') )
    ->show();