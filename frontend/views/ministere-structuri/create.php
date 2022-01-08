<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereStructuri */

$this->title = 'Create Ministere Structuri';
$this->params['breadcrumbs'][] = ['label' => 'Ministere Structuris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-structuri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
