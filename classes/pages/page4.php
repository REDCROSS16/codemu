<?php

include '../Link/Menu.php';
include '../Form/Form.php';
include '../Form/Input.php';
echo '<h1 style="text-align: center">Форма для входа</h1>';


$form = new Form();
$form->setAttributes([
    'method' => 'POST',
    'action' => 'test.php'
]);

$login = (new Tag('input'))->setAttributes([
    'name'       =>'login',
    'type'       =>'text',
    'placeholder'=>'Введите логин'
]);

$pass = (new Tag('input'))->setAttributes([
    'name'       =>'pass',
    'type'       =>'password',
    'placeholder'=>'Введите пароль'
]);

$submit = (new Tag('input'))->setAttributes([
    'name'       =>'submit',
    'type'       =>'submit',
    'value'      =>'Отправить форму'
]);


echo '<div style="float: right; margin-right: 200px">'
    .$form->open()
        . (new Tag('label'))->show() . 'Login'
        .'<br>'
    . $login->open()
        .'<br>'
    . (new Tag('label'))->show() . 'Password'
    .'<br>'
    . $pass->open()
    .'<br>'
    . $submit->open()
    . $form->close()
.'</div>';


# эта форма сохраняет данные
$form = (new Form)->setAttributes(['action' => '', 'method' => 'GET']);
echo $form->open();
echo (new Input)->setAttr('name', 'year')->open();
echo (new Input)->setAttr('type', 'submit')->open();
echo $form->close();

# сумма 5 чисел
$sumForm = new Form();
$sumForm->setAttributes([
    'method' => 'get',
    'action' => ''
]);
echo 'СУММА 5 чисел!';
echo $sumForm->open()
    . (new Input)->setAttributes(['type' => 'text', 'name' => 'num1'])->open()
    .  (new Input)->setAttributes(['type' => 'text', 'name' => 'num2'])->open()
    .  (new Input)->setAttributes(['type' => 'text', 'name' => 'num3'])->open()
    .  (new Input)->setAttributes(['type' => 'text', 'name' => 'num4'])->open()
    .  (new Input)->setAttributes(['type' => 'text', 'name' => 'num5'])->open()
    .  (new Input)->setAttributes(['type' => 'submit', 'name' => 'numsub'])->open()
    . $sumForm->close();

echo $_GET['num1'] + $_GET['num2'] + $_GET['num3'] + $_GET['num4'] + $_GET['num5'];
