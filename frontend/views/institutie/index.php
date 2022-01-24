<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institutie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Minister',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'width' => '15%'
                    ]
                ],
                'attribute' => 'institutie_minister_id',
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Structura',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'width' => '20%'
                    ]
                ],
                'attribute' => 'institutie_structura',
                'value' => function ($model) {
                    return $model->structura->structura_nume;
                }
            ],
            [
                'label' => 'Denumire',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'width' => '20%'
                    ]
                ],
                'attribute' => 'institutie_denumire',
                'value' => function ($model) {
                    return $model->institutie_denumire;
                }
            ],
            [
                'label' => 'Localitate',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'width' => '20%'
                    ]
                ],
                'attribute' => 'institutie_localitate_id',
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],
            'institutie_data_creare',
            [
                'label' => 'Stare',
                'format' => 'raw',
                'attribute' => 'institutie_status',
                'value' => function($model){
                    if($model->institutie_status === 1){
                        return '<span class="text-success font-weight-bold">Activă</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactivă</span>';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
