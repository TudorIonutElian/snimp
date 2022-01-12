<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZileLibere */

$this->title = 'Create Zile Libere';
$this->params['breadcrumbs'][] = ['label' => 'Zile Liberes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zile-libere-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
