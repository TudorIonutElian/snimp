<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServicii */

$this->title = $model->id_sss;
$this->params['breadcrumbs'][] = ['label' => 'Lista servicii oferite', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="structuri-subordonate-servicii-view">

    <h1 class="my-3">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Update', ['Actualizeaza', 'id_sss' => $model->id_sss], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Sterge', 'id_sss' => $model->id_sss], [
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
                'label' => 'Structura',
                'value' => function ($model) {
                    $structura = \common\models\InstitutiiStructuriSubordonate::find()->where(['id_iss' => $model->structura_subordonata_id_sss])->one();
                    return $structura->institutie_denumire_iss;
                }
            ],

            [
                'label' => 'Serviciul',
                'value' => function ($model) {
                    $serviciul = \common\models\TipuriServiciu::find()->where(['id' => $model->serviciu_id_sss])->one();
                    return $serviciul->tip_serviciu_denumire;
                }
            ],

            [
                'label' => 'Localitate',
                'value' => function ($model) {
                    $localitate = \common\models\Localitate::find()->where(['id' => $model->localitate_id_sss])->one();
                    return $localitate->localitate_nume;
                }
            ],

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_weekend_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    } else if ($model->is_open_weekend_sss == 1) {
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Disponibil Non Stop?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_nonstop_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    } else if ($model->is_open_nonstop_sss == 1) {
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Stare Serviciu',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_active_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Inactiv</span>';
                    } else if ($model->is_active_sss == 1) {
                        $content = '<span class="text-center text-success font-weight-bold">Activ</span>';
                    }
                    return $content;
                }
            ],
        ]
    ]) ?>

</div>
