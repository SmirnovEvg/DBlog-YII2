<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */

$this->title = 'Обновить пост: ' . $model->name;
?>
<div class="lessons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
