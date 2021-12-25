<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Localitate */

$this->title = 'Create Localitate';
$this->params['breadcrumbs'][] = ['label' => 'Localitates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localitate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
