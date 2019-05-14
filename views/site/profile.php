<?php
use yii\helpers\Html;
?>


<div class="account_content">
    <div class='account_name'>
        <div class='account_line'></div>
        <h1><?= Yii::$app->user->identity->username ?></h1>
    </div>
    <div class="account_information">
        <?= Yii::$app->user->identity->email ?>
    </div>
    <div class="account_exit">
        <?php
        echo (Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton('Выйти из аккаунта')
            . Html::endForm());
        ?>
    </div>
</div>