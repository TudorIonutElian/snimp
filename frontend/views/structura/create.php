<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Structura */

$this->title = 'Create Structura';
$this->params['breadcrumbs'][] = ['label' => 'Structuras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
