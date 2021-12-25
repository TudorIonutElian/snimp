<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institutie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'institutie_structura',
            'institutie_denumire',
            'institutie_localitate_id',
            'institutie_data_creare',
            //'institutie_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
