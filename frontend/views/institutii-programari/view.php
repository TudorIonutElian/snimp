<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiProgramari */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Institutii Programaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutii-programari-view">

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
            'ip_institutie_id',
            'ip_user_id',
            'ip_date_time',
            'ip_localitate_id',
            'ip_validata_de',
            'ip_status',
            'ip_data_finalizare',
        ],
    ]) ?>

</div>
