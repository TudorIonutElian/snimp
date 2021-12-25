<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Judet */

$this->title = 'Create Judet';
$this->params['breadcrumbs'][] = ['label' => 'Judets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
