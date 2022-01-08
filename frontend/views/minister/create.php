<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Minister */

$this->title = 'Create Minister';
$this->params['breadcrumbs'][] = ['label' => 'Ministers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minister-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
