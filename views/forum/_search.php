<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ForumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search__block">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= Html::activeTextInput($model, 'name'); ?>

    <?= Html::submitButton('') ?>

    <?php ActiveForm::end(); ?>

</div>
