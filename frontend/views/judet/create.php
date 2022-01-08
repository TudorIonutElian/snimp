<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Judet */

$this->params['breadcrumbs'][] = ['label' => 'Judets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
