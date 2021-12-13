<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Structuris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Structuri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'structura_nume',
            'structura_status',
            'structura_start_date',
            'structura_end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
