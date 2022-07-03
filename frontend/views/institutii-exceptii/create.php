<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiExceptii */

$this->title = 'Adaugă exceptii în cadrul institutiei';
$this->params['breadcrumbs'][] = ['label' => 'Listă excepții', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-exceptii-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
