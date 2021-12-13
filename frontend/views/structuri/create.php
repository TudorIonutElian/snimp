<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Structuri */

$this->title = 'Create Structuri';
$this->params['breadcrumbs'][] = ['label' => 'Structuris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
