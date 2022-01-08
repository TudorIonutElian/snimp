<?php

use common\models\Regiune;
use kartik\select2\Select2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Județelor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-index">
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă JUDEȚ', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'striped' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '5%'
                    ]
                ],
            ],
            [
                'label' => 'Regiune Județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->regiune->regiune_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'judet_regiune',
                    'value' => '',
                    'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                    'options' => ['multiple' => true, 'placeholder' => 'Selecteaza regiune ...']
                ])
            ],
            [
                'label' => 'Denumire',
                'attribute' => 'judet_nume',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
            ],
            [
                'label' => 'Indicativ',
                'attribute' => 'judet_indicativ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '15%'
                    ]
                ],
            ],
            [
                'label' => 'Număr Localități',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center',
                        'width' => '20%'
                    ]
                ],
                'value' => function ($model) {
                    return count($model->localitati);
                }
            ],

            [
                'header' => 'Acțiuni Județe',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '5%'
                    ]
                ],
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model) {
                        return Html::a('<i class="fas fa-eye"></i>', $model, ['class' => 'btn btn-sm btn-outline-primary rounded']);
                    },
                    'update' => function ($model) {
                        return Html::a('<i class="fas fa-edit"></i>', $model, ['class' => 'btn btn-sm btn-outline-secondary rounded']);
                    },
                    'delete' => function ($model) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', $model, ['class' => 'btn btn-sm btn-outline-danger rounded']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
