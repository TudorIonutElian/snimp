<?php

use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriServiciuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipuri Serviciu Public';
?>
<div class="tipuri-serviciu-index">

    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă SERVICIU PUBLIC', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Denumire Serviciu Public',
                'attribute' => 'tip_serviciu_denumire',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle'
                    ]
                ],
            ],
            [
                'label' => 'Data Creare',
                'attribute' => 'tip_serviciu_start_date',
                'format' => 'date',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],
            [
                'label' => 'Data Radiere',
                'format' => 'date',
                'attribute' => 'tip_serviciu_end_date',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],
            [
                'label' => 'Stare',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'attribute' => 'tip_serviciu_active',
                'value' => function ($model) {
                    if ($model->tip_serviciu_active === 1) {
                        return '<span class="text-success font-weight-bold">Activ</span>';
                    } else {
                        return '<span class="text-danger font-weight-bold">Inactiv</span>';
                    }
                },
                'filter' => Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'tip_serviciu_active',
                        'data' => [
                            '0' => 'Inactiv',
                            '1' => 'Activ'
                        ],
                        'options' => ['placeholder' => ' Stare '],
                        'language' => 'en',
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]
                ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
