<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */

$this->title = $news->name;
\yii\web\YiiAsset::register($this);
?>
<div class="page_headline">
    <div class='page_headline_head'>
        <div class='line'></div>
        <?= Html::encode($this->title) ?>
    </div>
    <div class='page_likes'>
        <div>
        <?php $form = ActiveForm::begin(); ?>
        
        <?= Html::submitButton('Save', ['class' => 'add__post__submit']) ?>
    
        <?php ActiveForm::end(); ?>
        </div>
        <div id='likesCount'><?= $likes ?></div>
    </div>
</div>
<div class='page_content'>
    <?= $news->content ?>
</div>
<p>
    <?php if (Yii::$app->user->identity->isAdmin == 1) { ?>
        <?= Html::a('Обновить', ['update', 'id' => $news->post_id], ['class' => 'add_button']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $news->post_id], [
            'class' => 'add_button',
            'style' => 'background-color: #d9b2aa',
            'data' => [
                'confirm' => 'Точно удалить этот пост?',
                'method' => 'post',
            ],
        ]) ?>
    <?php
}
?>
</p>
</div>