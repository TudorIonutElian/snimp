<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServicii */
/* @var $servicii common\models\InstitutiiServicii */

$this->title = 'Adaugă servicii Structurii';
$this->params['breadcrumbs'][] = ['label' => 'Listă servicii oferite', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-servicii-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'servicii' => $servicii
    ]) ?>

</div>
