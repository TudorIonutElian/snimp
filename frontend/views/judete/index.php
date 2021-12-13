<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudeteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judete-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judet_nume',
            'judet_regiune',
            'judet_status',
            'judet_created',
            //'judet_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
