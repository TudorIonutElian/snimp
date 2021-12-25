<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judet_indicativ',
            'judet_nume',
            'judet_regiune',
            'judet_status',
            //'judet_created',
            //'judet_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
