<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiExceptii */

$this->title = 'Date excepție';
$this->params['breadcrumbs'][] = ['label' => 'Listă excepții', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutii-exceptii-view">

    <h1 class="my-3">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Actualizare', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Stergere', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Denumire institutie',
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],
            [
                'label' => 'Denumire execeptie',
                'value' => function ($model) {
                    return $model->exceptie->te_exceptie_denumire;
                }
            ],
        ],
    ]) ?>

</div>
