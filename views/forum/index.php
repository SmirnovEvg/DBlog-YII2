<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ForumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Форум';
?>
<div class="container">
    <div class="col-md-3">
        
        <?php foreach ($category as $categorys) { ?>
            <div class="post1">
                <?php
                if ($categorys->language == 'c_plus') {
                    echo "C++";
                } elseif ($categorys->language == 'c_sharp') {
                    echo "C#";
                } else {
                    ?>
                    <?= Html::a($categorys->language, ['index', 'ForumSearch[language]' => $categorys->language]) ?>
                <?php
            }
            ?>
            </div>
        <?php } ?>
        <?php if(!Yii::$app->user->isGuest){?>
            <?=
            Html::a('Создать пост', ['create'], ['class' => 'add_button']);?>
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
