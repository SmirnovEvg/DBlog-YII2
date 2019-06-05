<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */

$this->title = $lessons->name;
\yii\web\YiiAsset::register($this);
?>
<div class="page_headline">
    <div class='page_headline_head'>
        <div class='line'></div>
        <?= Html::encode($this->title) ?>
    </div>
    <div class='block__likes'>
        <div>
        <div class="like__button" post-id="<?=$lessons->post_id?>"></div>
        </div>
        <div id='likesCount' like-count="<?= $likes ?>"><?= $likes ?></div>
    </div>
</div>
<div class='page_content'>
    <?= $lessons->content ?>
</div>
<p>
<?php if (Yii::$app->user->identity->isAdmin == 1) { ?>
        <?= Html::a('Обновить', ['update', 'id' => $lessons->post_id], ['class' => 'add_button']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $lessons->post_id], [
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