<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regiuni */

$this->title = 'Create Regiuni';
$this->params['breadcrumbs'][] = ['label' => 'Regiunis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiuni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
