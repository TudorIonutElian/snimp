<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Localitate */

$this->title = 'Create Localitate';
$this->params['breadcrumbs'][] = ['label' => 'Localitates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localitate-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
