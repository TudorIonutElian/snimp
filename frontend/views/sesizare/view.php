<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sesizare */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sesizares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sesizare-view">

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
            'sesizare_titlu',
            'sesizare_continut:ntext',
            'sesizare_imagine',
            'sesizare_ip',
            'sesizare_user_id',
            'sesizare_data_creare',
            'sesizare_data_solutionare',
            'sesizare_comentariu:ntext',
            'sesizare_status',
            'sesizare_institutie',
            'sesizare_serviciu',
        ],
    ]) ?>

</div>
