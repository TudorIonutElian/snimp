<?php

use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Judet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Judets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="judet-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Indicativ Județ',
                'value' => function ($model) {
                    return $model->judet_indicativ;
                }
            ],
            [
                'label' => 'Nume Județ',
                'value' => function ($model) {
                    return $model->judet_nume;
                }
            ],
            [
                'label' => 'Regiune Județ',
                'value' => function ($model) {
                    return $model->regiune->regiune_nume;
                }
            ],
            [
                'label' => 'Stare Județ',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->judet_status === 1) {
                        return '<span class="text-success font-weight-bold">Activ</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactiv</span>';
                }
            ],
            [
                'label' => 'Data creare Județ',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="text-info">'.$model->judet_created.'</span>';
                }
            ],
            [
                'label' => 'Data actualizare Județ',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="text-info">'.$model->judet_updated.'</span>';
                }
            ],
        ],
    ]) ?>

</div>
