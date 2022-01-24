<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriProgramLucruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipuri Program de Lucru existente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-program-lucru-index">


    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1 class="text-center mb-3"><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Create Tipuri Program Lucru', ['create'], ['class' => 'btn btn-success btn-block']) ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Ora început program',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'tpl_ora_start',
                'value' => function ($model) {
                    return $model->tpl_ora_start;
                }
            ],
            [
                'label' => 'Ora sfârșit program',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'attribute' => 'tpl_ora_sfarsit',
                'value' => function ($model) {
                    return $model->tpl_ora_sfarsit;
                }
            ],
            [
                'label' => 'Stare tip program',
                'contentOptions' => [
                    'style' => [
                        'vertical-align' => 'middle',
                        'text-align' => 'center'
                    ]
                ],
                'format' => 'raw',
                'attribute' => 'tpl_is_active',
                'value' => function ($model) {
                    if ($model->tpl_is_active === 1) {
                        return '<span class="text-success font-weight-bold">Activ</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Activ</span>';
                }
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>


</div>
