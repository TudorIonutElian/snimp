<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Programares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="programare-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'programare_institutie',
            'programare_serviciu',
            'programare_localitate',
            'programare_user',
            'programare_datetime',
            'programare_validata_de',
            'programare_numar_unic',
            'programare_data_numar_unic',
            'programare_data_finalizare',
        ],
    ]) ?>

</div>
