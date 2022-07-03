<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */

$this->title = 'Actualizare date punct de lucru';
$this->params['breadcrumbs'][] = ['label' => 'Lista puncte de lucru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sspl, 'url' => ['view', 'id_sspl' => $model->id_sspl]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structuri-subordonate-puncte-lucru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
