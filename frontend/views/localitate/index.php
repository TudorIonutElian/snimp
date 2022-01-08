<?php

use common\models\Judet;
use common\models\Regiune;
use kartik\select2\Select2;
use yii\bootstrap5\LinkPager;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LocalitateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Localități';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localitate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adauga Localitate nouă', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Denumire localitate',
                'attribute' => 'localitate_nume',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
            ],
            [
                'label' => 'Județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'localitate_judet',
                'value' => function ($model) {
                    return $model->judet->judet_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ArrayHelper::map(Judet::find()->all(), 'id', 'judet_nume'),
                    'options' => ['multiple' => false, 'placeholder' => 'Județ ...']
                ])
            ],
            [
                'label' => 'Regiune',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'value' => function ($model) {
                    return $model->judet->regiune->regiune_nume;
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                    'options' => ['multiple' => false, 'placeholder' => 'Regiune ...']
                ])
            ],
            [
                'label' => 'Urban / Rural',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_urban',
                'value' => function ($model) {
                    if ($model->localitate_urban === 1) {
                        return '<span>DA</span>';
                    }
                    return '<span>NU</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Rural', '1' => 'Urban'],
                    'options' => ['multiple' => false, 'placeholder' => 'Urban / Rural ...']
                ])
            ],
            [
                'label' => 'Rețedință de județ',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_resedinta',
                'value' => function ($model) {
                    if ($model->localitate_resedinta === 1) {
                        return '<span>DA</span>';
                    }
                    return '<span>NU</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Nu', '1' => 'Da'],
                    'options' => ['multiple' => false, 'placeholder' => 'Reședință ...']
                ])
            ],
            [
                'label' => 'Stare',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'localitate_status',
                'value' => function ($model) {
                    if ($model->localitate_status === 1) {
                        return '<span>Activă</span>';
                    }
                    return '<span>Inactivă</span>';
                },
                'filter' => Select2::widget([
                    'name' => 'state_2',
                    'value' => '',
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'options' => ['multiple' => false, 'placeholder' => 'Stare ...']
                ])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>


</div>
