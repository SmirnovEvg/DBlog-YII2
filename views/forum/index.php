<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ForumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Форум';
?>
<div class="container">
    <div class="col-md-3 language">
        <div class="language_list">
            <?= Html::a('all', ['index', 'ForumSearch[language]' => ''], ['id' => 'all']) ?>
            <?php foreach ($categorys as $category) { ?>
                <?= Html::a($category->name, ['index', 'ForumSearch[language]' => $category->id], ['id' => $category->id]) ?>
            <?php } ?>
        </div>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <?=
                Html::a('Создать пост', ['create'], ['class' => 'add_button']); ?>
        <?php
    }
    ?>
    </div>
    <div class="col-md-9">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'forum_items'
            ],
            'itemOptions' => ['class' => 'question'],
            'layout' => "{items}\n{pager}",
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_list_item', ['model' => $model]);
            },
            'pager' => [
                'options' => [
                    'tag' => 'div'
                ],
                'maxButtonCount' => 8,
                'options' => ['class' => 'pagination__button'],
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'activePageCssClass' => 'pagination__button_active',
                'linkOptions' => ['class' => ''],
                'disabledPageCssClass' => '',
            ],
        ]) ?>
    </div>
</div>