<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prestari */

$this->title = 'Adaugă prestare';
$this->params['breadcrumbs'][] = ['label' => 'Lista prestari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestari-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
