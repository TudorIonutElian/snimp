<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiServicii */

$this->title = 'Adaugă servicii';
$this->params['breadcrumbs'][] = ['label' => 'Lista serviciilor oferite de Instituție', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-servicii-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
