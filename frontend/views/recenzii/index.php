<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RecenziiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recenziis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recenzii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recenzii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recenzie_institutie',
            'recenzie_serviciu',
            'recenzie_localitate',
            'recenzie_mesaj',
            //'recenzie_adaugata_de',
            //'recenzie_stele',
            //'recenzie_data_adaugare',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
