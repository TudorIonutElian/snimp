<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regiune */

$this->title = 'Create Regiune';
$this->params['breadcrumbs'][] = ['label' => 'Regiunes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiune-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
