<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiciiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Serviciis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Servicii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'serviciu_denumire_s',
            'serviciu_active_s',
            'serviciu_active_since_s',
            'serviciu_until_s',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
