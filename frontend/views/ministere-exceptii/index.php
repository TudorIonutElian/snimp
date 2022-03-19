<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinistereExceptiiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Excepții în cadrul Ministerului';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-exceptii-index">

    <h1 class="text-center">
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fas fa-plus mr-2"></i>Adaugă Excepție', ['create'], ['class' => 'btn btn-success ml-2']) ?>
    </h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Minister',
                'attribute' => 'minister_id',
                'value' => function($model){
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Denumire Excepție',
                'attribute' => 'exceptie_id',
                'value' => function($model){
                    return $model->exceptie->te_exceptie_denumire;
                }
            ],
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
