<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */

$this->title = $model->id_iss;
$this->params['breadcrumbs'][] = ['label' => 'Institutii Structuri Subordonates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutii-structuri-subordonate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_iss' => $model->id_iss], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_iss' => $model->id_iss], [
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
            'id_iss',
            'institutie_parinte_iss',
            'institutie_denumire_iss',
            'institutie_data_creare_iss',
            'institutie_data_actualizare_iss',
            'institutie_stare_iss',
        ],
    ]) ?>

</div>
