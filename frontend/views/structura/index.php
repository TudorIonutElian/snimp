<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Structuras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Structura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'structura_minister',
            'structura_nume',
            'structura_start_date',
            'structura_end_date',
            //'structura_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
