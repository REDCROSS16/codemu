<?php

include '../Link/Menu.php';
include '../Tag/Form/Form.php';
include '../Tag/Form/Input.php';
include '../Tag/Form/Submit.php';
include '../Tag/Form/Password.php';
include '../Tag/Form/Hidden.php';
include '../Tag/Form/Textarea.php';
?>
<style>
    .textarea {
        width: 400px;
        height: 200px;
        background: #000;
        color: white;
    }
</style>
<?php
echo '<h1 style="text-align: center">Форма для входа</h1>';


$form = new Form();
$form->setAttributes([
    'method' => 'POST',
    'action' => 'admin.php'
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

//echo (new Submit)->setAttr('type','submit');
//echo (new Submit)->setAttr('name', 'super');

echo new Password('p-1');

$form1 = new Form();
$form1->setAttributes([
    'action' => 'test.php',
    'method' => 'POST'
]);

echo $form1->open()
    . (new Hidden)->setAttr('name', 'id')->setAttr('value', '123')
    . (new Input)->setAttributes(['name' => 'name', 'type'=>'text'])
    . (new Password('p-2'))
    . (new Submit)
    . $form1->close();


//echo (new Textarea)->setAttr('name', 'text')->open();

echo (new Textarea)
    ->setAttr('name', 'text')
    ->setText('my mess')
    ->addClass('textarea')
    ->show();
//echo (new Textarea);