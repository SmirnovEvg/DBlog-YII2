<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';

?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'register_form'
    ]
]); ?>

<h2><?= Html::encode($this->title) ?></h2>

<?= $form->field($login_model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>

<?= $form->field($login_model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

<?= Html::submitButton('Войти', ['class' => '', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>