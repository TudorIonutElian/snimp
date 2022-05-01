<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServicii */

$this->title = 'Actualizează servicii ale Structurii';
$this->params['breadcrumbs'][] = ['label' => 'Listă servicii oferite', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sss, 'url' => ['view', 'id_sss' => $model->id_sss]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structuri-subordonate-servicii-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
