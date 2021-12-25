<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SesizareEmail */

$this->title = 'Create Sesizare Email';
$this->params['breadcrumbs'][] = ['label' => 'Sesizare Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizare-email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
