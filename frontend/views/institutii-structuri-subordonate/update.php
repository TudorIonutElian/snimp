<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */

$this->title = 'Update Institutii Structuri Subordonate: ' . $model->id_iss;
$this->params['breadcrumbs'][] = ['label' => 'Institutii Structuri Subordonates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_iss, 'url' => ['view', 'id_iss' => $model->id_iss]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institutii-structuri-subordonate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
