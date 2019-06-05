<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';

?>
<div class="container">
    <div class="col-md-3 language">
        <div class="language_list">
        <?= Html::a('all', ['index', 'NewsSearch[language]' => ''], ['id' => 'all']) ?>              
            <?php foreach ($categorys as $category) { ?>
                <?= Html::a($category->name, ['index', 'NewsSearch[language]' => $category->id], ['id' => $category->id]) ?>
                <?php } ?>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <?= Html::a('Создать пост', ['create'], ['class' => 'add_button']); ?>
                <?php } ?>
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
</div>