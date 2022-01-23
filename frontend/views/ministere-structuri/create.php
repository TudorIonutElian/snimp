<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereStructuri */

$this->title = 'Adaugă Structură în cadrul Ministerului';
$this->params['breadcrumbs'][] = ['label' => 'Ministere Structuris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-structuri-create">

    <h1 class="text-center mb-3"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
