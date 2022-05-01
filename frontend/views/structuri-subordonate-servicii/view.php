<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServicii */

$this->title = $model->id_sss;
$this->params['breadcrumbs'][] = ['label' => 'Structuri Subordonate Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="structuri-subordonate-servicii-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_sss' => $model->id_sss], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_sss' => $model->id_sss], [
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
            'id_sss',
            'institutie_id_sss',
            'structura_subordonata_id_sss',
            'serviciu_id_sss',
            'localitate_id_sss',
            'is_open_weekend_sss',
            'is_open_nonstop_sss',
            'is_active_sss',
        ],
    ]) ?>

</div>
