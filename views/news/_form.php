<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\News */
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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Имя поста', 'class' => 'add__post__name'])->label(false) ?>

    <?= $form->field($model, 'language')->dropDownList(
        [
            '1' => 'javascript',
            '2' => 'php',
            '4' => 'C#',
            '5' => 'C++',
            '3' => 'python',
            '6' => 'ruby',
        ],
        ['class' => 'add__post__language']
    )->label(false);
    ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'type')->textInput(['readonly' => true, 'value' => 'lesson', 'class' => 'add__post__type'])->label(false) ?>

    <?= Html::submitButton('Save', ['class' => 'add__post__submit']) ?>

    <?php ActiveForm::end(); ?>

</div>