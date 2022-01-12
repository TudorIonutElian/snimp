<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ZileLibereSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zile Liberes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zile-libere-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zile Libere', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Anul Calendaristic',
                'attribute' => 'anul_calendaristic',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ]
            ],
            [
                'label' => 'Ziua Calendaristică',
                'attribute' => 'data_calendaristica',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ]
            ],
            [
                'label' => 'Explicație',
                'attribute' => 'data_explicatie',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ]
            ],
            [
                'label' => 'Zile până la data respectivă',
                'format' => 'raw',
                'value' => function ($model) {
                    $ziua_curenta = time();
                    $ziua_target = strtotime($model->data_calendaristica);
                    $diferenta_zile = 0;

                    $diferenta_zile = $ziua_target - $ziua_curenta;
                    $diferenta_totala = round($diferenta_zile / (60 * 60 * 24), 0);

                    $string_to_print = "";
                    if($diferenta_totala < 0){
                        $zile = abs($diferenta_totala);
                        $string_to_print = "Au trecut <b>$zile</b> zile de la data respectivă.";
                    }else{
                        $string_to_print = "Mai sunt <b>$diferenta_totala</b> zile până la data respectivă.";
                    }

                    return $string_to_print;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
