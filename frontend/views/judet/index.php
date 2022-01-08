<?php

use common\models\Regiune;
use kartik\select2\Select2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Judet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'judet_created',
            //'judet_updated',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model) {
                        return Html::a('<i class="fas fa-eye mr-1"></i>Vizualizeaza', $model, ['class' => 'btn btn-sm btn-outline-primary rounded']);
                    },
                    'update' => function ($model) {
                        return Html::a('<i class="fas fa-edit mr-1"></i>Editează', $model, ['class' => 'btn btn-sm btn-outline-secondary rounded']);
                    },
                    'delete' => function ($model) {
                        return Html::a('<i class="fas fa-trash-alt mr-1"></i>Editează', $model, ['class' => 'btn btn-sm btn-outline-danger rounded']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
