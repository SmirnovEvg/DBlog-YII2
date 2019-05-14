<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';

?>
<?php
$form = ActiveForm::begin([
    'options' => [
        'class' => 'register_form'
    ]
]);
?>

<h2><?= Html::encode($this->title) ?></h2>

<?= $form->field($model, 'username')->textInput(['placeholder' => 'Имя'])->label(false) ?>

<?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>

<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

<?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Повторите пароль'])->label(false) ?>

<?= Html::submitButton('Регистрация', ['class' => '', 'name' => 'register-button']) ?>

<?php
ActiveForm::end();
?>