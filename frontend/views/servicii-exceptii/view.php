<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiExceptii */

$this->title = $model->id_se;
$this->params['breadcrumbs'][] = ['label' => 'Servicii Exceptiis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicii-exceptii-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_se' => $model->id_se], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_se' => $model->id_se], [
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
            'id_se',
            'serviciu_id_se',
            'start_exceptie_se',
            'end_exceptie_se',
            'added_by_se',
            'is_active_se',
        ],
    ]) ?>

</div>
