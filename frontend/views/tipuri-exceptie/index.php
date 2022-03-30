<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriExceptieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista excepțiilor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-exceptie-index">

    <h1 class="text-center my-2">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Adaugă Excepție', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'te_exceptie_denumire',
            'te_exceptie_start',
            'te_exceptie_end',
            'te_exceptie_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
