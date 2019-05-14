<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('js/forum.js');
/* @var $this yii\web\View */
/* @var $model app\models\Forum */

$this->title = $forum->name;
\yii\web\YiiAsset::register($this);
?>
<div class="forum_headline">
    <?= $forum->name ?>
</div>
<div class='forum_question'>
    <?= $forum->text ?>
</div>
<div class='forum_question_info'>
    <div class='forum_question_info_author'>
        <?= $forum->user->username ?>
    </div>
    <div class='forum_question_info_date'>
        <?= $forum->date ?>
    </div>
</div>
<div class='forum_comments_block'>
    <h2>Ответы</h2>
    <?php if (!empty($comments)) : ?>
        <?php foreach ($comments as $comment) : ?>
            <div class='forum_comment'>
                <div class='forum_comment_main'>
                    <div class='forum_comment_image'>
                        <?php if ($comment->user->isAdmin == 1) { ?>
                            <img src='https://img.icons8.com/ios/100/000000/businessman-filled.png' />
                        <?php } else { ?>
                            <img src='https://img.icons8.com/ios/100/000000/guest-male-filled.png' />
                        <?php } ?>
                    </div>
                    <div class='forum_comment_content'>
                        <div class='forum_comment_content_user'>
                            <div class='forum_comment_content_user_name'>
                                <?= $comment->user->username ?>
                            </div>
                            <div class='forum_comment_content_user_date'>
                                <?= $comment->date ?>
                            </div>
                            <div class='forum_comment_content_user_answer'>
                            </div>
                        </div>
                        <div class='forum_comment_content_answer'>
                            <?= $comment->comment ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
    <div class='forum_comment_form'>
        <?php $form = ActiveForm::begin([
            'action' => ['forum/comment', 'id' => $forum->forum_id],
            'options' => ['class' => '', 'role' => 'form'],
            'fieldConfig' => [
                'options' => [
                    'tag' => false,
                ],
            ],
        ]) ?>
        <?= $form->field($commentForm, 'comment')->textarea(['placeholder' => 'Введите комментарий.', 'class' => '', 'id' => 'comment'])->label(false) ?>
        <button class='forum_child_comment_form_button' type="submit">Отправить</button>
        <span id='code' class='forum_comment_form_button'>
            <Код>
        </span>
        <?php ActiveForm::end(); ?>
    </div>
    <?php endif; ?>
</div>