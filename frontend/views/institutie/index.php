<?php

use yii\bootstrap5\Modal;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituții';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-index">

    <?php
    Modal::begin([
        //'title' => '<h2 class="text-center text-success font-weight-bold">Adăugare Utilizator Nou</h2>',
        'id' => 'modal-adaugare-institutie',
        'size' => 'modal-lg',
        //'toggleButton' => ['label' => 'click me'],
    ]);

    echo '<div id="modal-adaugare-institutie-content"></div>';

    Modal::end();
    ?>

    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                <i class="fas fa-university mr-2"></i>
                <?= Html::encode($this->title) ?>
                <?= Html::a('Adaugă Institutie', ['institutie/create'], ['class' => 'btn btn-success mx-3', 'id' => 'add-institutie-btn']) ?>
            </h1>

        </div>
    </div>





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