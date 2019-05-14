<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="page_headline">
    <div class='page_headline_head'>
        <div class='line'></div>
        <?= Html::encode($this->title) ?>
    </div>
    <div class='page_likes'>
        <div>
            <form method='POST' onsubmit='show()'>
                <input type='submit' name='likeBut' value='' id='sub' />
            </form>
        </div>
        <div id='likesCount'>1</div>
    </div>
</div>
<div class='page_content'>
    <?= $model->content ?>
</div>
<p>
    <?= Html::a('Обновить', ['update', 'id' => $model->post_id], ['class' => 'add_button']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->post_id], [
        'class' => 'add_button',
        'style' => 'background-color: #d9b2aa',
        'data' => [
            'confirm' => 'Точно удалить этот пост?',
            'method' => 'post',
        ],
    ]) ?>
</p>
</div>