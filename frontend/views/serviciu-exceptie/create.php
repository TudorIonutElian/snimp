<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciuExceptie */

$this->title = 'Create Serviciu Exceptie';
$this->params['breadcrumbs'][] = ['label' => 'Serviciu Excepties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviciu-exceptie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
