<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereExceptii */

$this->title = 'Create Ministere Exceptii';
$this->params['breadcrumbs'][] = ['label' => 'Ministere Exceptiis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-exceptii-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
