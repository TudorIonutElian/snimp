<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriServiciuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipuri Servicius';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-serviciu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipuri Serviciu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tip_serviciu_denumire',
            'tip_serviciu_start_date',
            'tip_serviciu_end_date',
            'tip_serviciu_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
