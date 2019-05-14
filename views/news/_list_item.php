<?php
// _list_item.php
use yii\helpers\Html;
?>

<div class="item" data-key="<?= $model->post_id; ?>">
    <div class='post__headline'>
        <?= Html::a(Html::encode($model->name), ['view', 'id' => $model->post_id]) ?>
    </div>
    <div class='post__content'>
        <?= Html::a(Html::encode($model->content), ['view', 'id' => $model->post_id]) ?>
    </div>
</div>