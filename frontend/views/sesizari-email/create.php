<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SesizariEmail */

$this->title = 'Create Sesizari Email';
$this->params['breadcrumbs'][] = ['label' => 'Sesizari Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizari-email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
