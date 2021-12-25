<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Create Programare';
$this->params['breadcrumbs'][] = ['label' => 'Programares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
