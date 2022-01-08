<?php

use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegiuneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomenclator Regiuni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiune-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă Regiune', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'striped' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'Denumire Regiune',
                            'value' => 'regiune_nume',
                            'attribute' => 'regiune_nume',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ]
                        ],
                        [
                            'label' => 'Stare Regiune',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->regiune_status === 1) {
                                    return '<span>Activa</span>';
                                } else {
                                    return '<span>Inactiva</span>';
                                }
                            },
                            'filter' => Select2::widget(
                                [
                                    'model' => $searchModel,
                                    'attribute' => 'regiune_status',
                                    'data' => [
                                        '0' => 'Inactiva',
                                        '1' => 'Activa'
                                    ],
                                    'options' => ['placeholder' => ' Stare '],
                                    'language' => 'en',
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]
                            ),
                        ],
                        [
                            'label' => 'Număr județe',
                            'format' => 'raw',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'value' => function ($model) {
                                return '<span class="font-weight-bold">' . count($model->judete) . '</span>';
                            }
                        ],
                        [
                            'label' => 'Data creare regiune',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'attribute' => 'regiune_created',
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
