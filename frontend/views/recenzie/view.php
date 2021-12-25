<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Recenzie */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recenzies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recenzie-view">

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
            'recenzie_institutie',
            'recenzie_serviciu',
            'recenzie_localitate',
            'recenzie_mesaj:ntext',
            'recenzie_adaugata_de',
            'recenzie_numar_stele',
            'recenzie_contact_email:email',
            'recenzie_contact_mobil',
            'recenzie_data_adaugare',
        ],
    ]) ?>

</div>
