<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiProgramari */

$this->title = 'Create Institutii Programari';
$this->params['breadcrumbs'][] = ['label' => 'Institutii Programaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-programari-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
