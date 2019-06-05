<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Forum */
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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'add__post__name', 'placeholder' => 'Имя вопроса'])->label(false) ?>

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

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'add__post__submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
