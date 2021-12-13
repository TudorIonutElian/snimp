<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExceptiiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exceptiis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exceptii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Exceptii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'denumire_exceptie',
            'start_exceptie',
            'end_exceptie',
            'status_exceptie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
