<?php
// _list_item.php
use yii\helpers\Html;
?>

<div class='question_headline'>
    <div class='question_name'>
        <?= Html::a(Html::encode($model->name), ['view', 'id' => $model->forum_id]) ?>
    </div>
</div>
<div class='question_info'>
    <div class='question_author'>
        <?= Html::a(Html::encode($model->user->username), ['view', 'id' => $model->forum_id]) ?>
    </div>
    <div class='question_date'>
        <?= Html::a(Html::encode($model->getDate()), ['view', 'id' => $model->forum_id]) ?>
    </div>
</div>