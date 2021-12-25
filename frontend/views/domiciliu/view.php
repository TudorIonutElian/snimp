<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Domiciliu */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Domicilius', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="domiciliu-view">

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
            'domiciliu_user',
            'domiciliu_regiune',
            'domiciliu_judet',
            'domiciliu_localitate',
            'domiciliu_is_resedinta',
            'domiciliu_status',
            'domiciliu_data_adaugarii',
        ],
    ]) ?>

</div>
