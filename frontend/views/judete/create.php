<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Judete */

$this->title = 'Create Judete';
$this->params['breadcrumbs'][] = ['label' => 'Judetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
