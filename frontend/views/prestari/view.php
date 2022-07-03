<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Prestari */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lista prestari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prestari-view">

    <h1 class="my-3">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Actualizare', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Stergere', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
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
                'label' => 'Institutie',
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],
            [
                'label' => 'Serviciu',
                'value' => function ($model) {
                    return $model->tipServiciu->tip_serviciu_denumire;
                }
            ],


            'denumire_p',

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_weekend == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_weekend == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_nonstop == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_nonstop == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Stare',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_active == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Inactiv</span>';
                    }else if($model->is_active == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Activ</span>';
                    }
                    return $content;
                }
            ],
        ],
    ]) ?>

</div>
