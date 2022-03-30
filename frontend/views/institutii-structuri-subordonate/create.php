<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */

$this->title = 'Adaugare structuri subordonate';
$this->params['breadcrumbs'][] = ['label' => 'Institutii Structuri Subordonates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-structuri-subordonate-create">

    <h1 class="text-center my-2"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
