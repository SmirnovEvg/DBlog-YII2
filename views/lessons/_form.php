<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="add__post">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'add__post__form'
             ]
        ]
    ); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=> 'Имя поста','class' => 'add__post__name'])->label(false) ?>

    <?= $form->field($model, 'language')->dropDownList([
        'javascript' => 'javascript',
        'php' => 'php',
        'c_sharp' => 'C#',
        'c_plus' => 'C++',
        'python' => 'python',
        'ruby' => 'ruby',
    ],
    ['class' => 'add__post__language'])->label(false);
    ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'placeholder' => 'Содержимое','class' => 'add__post__content'])->label(false) ?>

    <?= $form->field($model, 'type')->textInput(['readonly' => true, 'value' => 'lesson','class' => 'add__post__type'])->label(false) ?>

    <?= Html::submitButton('Save', ['class' => 'add__post__submit']) ?>

    <?php ActiveForm::end(); ?>

</div>