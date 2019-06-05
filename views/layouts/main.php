<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo.png', ['alt' => Yii::$app->name]),
            'brandUrl' => Yii::$app->homeUrl,
            'brandOptions' => [
                'class' => 'logo',
            ],
            'options' => [
                'class' => 'navbar-top',
            ]
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Новости', 'url' => ['/news/index']],
                ['label' => 'Уроки', 'url' => ['/lessons/index']],
                ['label' => 'Форум', 'url' => ['/forum/index']],
                Yii::$app->user->isGuest ? (['label' => '']) : (['label' => 'Понравилось', 'url' => ['/site/liked']]),
                Yii::$app->user->isGuest ? (['label' => 'Регистрация', 'url' => ['/site/signup']]) : (['label' => '']),
                Yii::$app->user->isGuest ? (['label' => 'Авторизация', 'url' => ['/site/login']]) : (['label' => Yii::$app->user->identity->username, 'url' => ['/site/profile']])
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-element">
                    Рассылка новостей:
                    <div class="news-mailing">
                        <form class='formFooter' action="../header_footer/email.php" method="post">
                            <input type="text" name='email' placeholder='Введите свой E-mail' pattern='^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required />
                            <button>
                                <img src="https://img.icons8.com/ios/50/000000/gmail.png" alt="Send" />
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 footer-element">
                    Мы в соцсетях:
                    <div class='social'>
                        <a href="https://vk.com/"><img src="https://img.icons8.com/ios/50/000000/vk-circled.png" alt="VK" /></a>
                        <a href="https://web.facebook.com/"><img src="https://img.icons8.com/ios/50/000000/facebook-circled.png" alt="Facebook" /></a>
                        <a href="https://twitter.com/"><img src="https://img.icons8.com/ios/50/000000/twitter-circled.png" alt="Twitter" /></a>
                        <a href="https://www.instagram.com/"><img src="https://img.icons8.com/ios/50/000000/instagram-new.png" alt="Instagram" /></a>
                    </div>
                </div>
                <div class="col-md-4 footer-element">
                    Контактная информация:
                    <div class='contacts'>
                        <a href="tel:+375447075587">+375(44)707-55-87</a><br />
                        <a href="tel:+375447075587">+375(44)707-55-87</a>
                        <p>watchstore.by@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>