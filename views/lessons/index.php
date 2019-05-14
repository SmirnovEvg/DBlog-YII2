<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Уроки';

?>
<div class="container">
    <div class="col-md-3">
        <?php foreach ($categorys as $category) { ?>
            <div class="post1">
                <?= Html::a($category->name, ['index', 'LessonsSearch[language]' => $category->id]) ?>
            </div>
        <?php } ?>
        <?= Html::a('Создать пост', ['create'], ['class' => 'add_button']) ?>
    </div>
    <div class="col-md-9">
        <div class="post-index">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => [
                    'tag' => 'div',
                ],
                'itemOptions' => ['class' => 'post'],
                'layout' => "{items}\n{pager}",
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_list_item', ['model' => $model]);
                },
                'pager' => [
                    'maxButtonCount' => 8,
                    'options' => ['class' => 'pagination__button'],
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                    'activePageCssClass' => 'pagination__button_active',
                    'prevPageCssClass' => 'pagination__button_back',
                    'nextPageCssClass' => 'pagination__button_next',
                    'firstPageCssClass' => 'pagination__button_first',
                    'lastPageCssClass' => 'pagination__button_last',
                    'linkOptions' => ['class' => ''],
                ],
            ]) ?>
        </div>
    </div>
</div>
</div>