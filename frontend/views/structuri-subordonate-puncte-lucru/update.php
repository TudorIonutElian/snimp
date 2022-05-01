<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */

$this->title = 'Update Structuri Subordonate Puncte Lucru: ' . $model->id_sspl;
$this->params['breadcrumbs'][] = ['label' => 'Structuri Subordonate Puncte Lucrus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sspl, 'url' => ['view', 'id_sspl' => $model->id_sspl]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structuri-subordonate-puncte-lucru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
