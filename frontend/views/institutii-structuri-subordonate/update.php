<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */

$this->title = 'Actualizare date' . $model->id_iss;
$this->params['breadcrumbs'][] = ['label' => 'Lista structuri subordonate', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_iss, 'url' => ['view', 'id_iss' => $model->id_iss]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institutii-structuri-subordonate-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
