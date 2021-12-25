<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LocalitateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Localitates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localitate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Localitate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'localitate_nume',
            'localitate_judet',
            'localitate_status',
            'localitate_urban',
            //'localitate_resedinta',
            //'localitate_created',
            //'localitate_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
