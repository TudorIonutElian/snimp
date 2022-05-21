<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */

$this->title = 'Adaugă Punct de lucru';
$this->params['breadcrumbs'][] = ['label' => 'Lista Puncte de lucru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-puncte-lucru-create">

    <h1 class="text-center mb-3"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
