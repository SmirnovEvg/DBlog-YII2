<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Понравилось';

?>
<div class="container">
    <div class="liked_list">
        <?php foreach ($posts as $post) { ?>
            <div class="post">
                <div class='post__headline'>
                    <?php if ($post->type == 'news') { ?>
                        <?= Html::a(Html::encode($post->name), ['news/view', 'id' => $post->post_id]); ?>
                    <?php } else { ?>
                        <?= Html::a(Html::encode($post->name), ['lessons/view', 'id' => $post->post_id]); ?>
                    <?php }
                ?>
                </div>
                <div class='post__content'>
                    <?php if ($post->type == 'news') { ?>
                        <?= Html::a(Html::encode($post->name), ['news/view', 'id' => $post->post_id]); ?>
                    <?php } else { ?>
                        <?= Html::a(Html::encode($post->name), ['lessons/view', 'id' => $post->post_id]); ?>
                    <?php }
                ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>