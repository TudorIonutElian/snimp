<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SesizareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesizares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizare-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sesizare', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sesizare_titlu',
            'sesizare_continut:ntext',
            'sesizare_imagine',
            'sesizare_ip',
            //'sesizare_user_id',
            //'sesizare_data_creare',
            //'sesizare_data_solutionare',
            //'sesizare_comentariu:ntext',
            //'sesizare_status',
            //'sesizare_institutie',
            //'sesizare_serviciu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
