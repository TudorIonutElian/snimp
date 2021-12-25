<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recenzie */

$this->title = 'Create Recenzie';
$this->params['breadcrumbs'][] = ['label' => 'Recenzies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recenzie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
