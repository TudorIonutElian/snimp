<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="flex-column h-100"> <!-- sidebar-collapse-->
    <?php $this->beginBody() ?>

    <div class="wrapper">
                <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <?php if(!Yii::$app->user->getIsGuest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Acasa</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <?= \Yii::$app->view->renderFile(Yii::getAlias('@app') . '\views\layouts\partials\menus\right-menu.php');?>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link text-center">
                <span class="brand-text font-weight-light mx-3">SNIMP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <?php if(!Yii::$app->user->getIsGuest() && Yii::$app->user->can('admin')): ?>
                    <?= $this->renderFile(Yii::getAlias('@app') . '\views\layouts\partials\menus\left_menu\administrator.php');?>
                <?php endif; ?>
                <?php if(!Yii::$app->user->getIsGuest() && Yii::$app->user->can('admin_minister')): ?>
                    <?= $this->renderFile(Yii::getAlias('@app') . '\views\layouts\partials\menus\left_menu\administrator_minister.php');?>
                <?php endif; ?>
                <?php if(!Yii::$app->user->getIsGuest() && Yii::$app->user->can('admin_institutie')): ?>
                    <?= $this->renderFile(Yii::getAlias('@app') . '\views\layouts\partials\menus\left_menu\administrator_institutie.php');?>
                <?php endif; ?>
                <?php if(!Yii::$app->user->getIsGuest() && Yii::$app->user->can('director_institutie')): ?>
                    <?= $this->renderFile(Yii::getAlias('@app') . '\views\layouts\partials\menus\left_menu\director_structura.php');?>
                <?php endif; ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <?= $content; ?>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->


    <?php $this->endBody() ?>
    </body>
<?php $this->endPage();