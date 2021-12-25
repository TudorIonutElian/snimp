<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Domiciliu */

$this->title = 'Create Domiciliu';
$this->params['breadcrumbs'][] = ['label' => 'Domicilius', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domiciliu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
