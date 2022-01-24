<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinistereServiciiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ministere Serviciis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-servicii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ministere Servicii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'minister_id',
            'tip_serviciu_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
