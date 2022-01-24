<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinistereServiciiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adaugă servicii Ministerului';
?>
<div class="ministere-servicii-index">

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă Serviciu', ['create'], ['class'=> 'btn btn-success btn-block']); ?>
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
                'label' => 'Minister',
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Serviciu',
                'value' => function ($model) {
                    return $model->tipServiciu->tip_serviciu_denumire;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>


</div>
