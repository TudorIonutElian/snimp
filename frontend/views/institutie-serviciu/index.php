<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutieServiciuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutie Servicius';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-serviciu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institutie Serviciu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'is_institutie',
            'is_serviciu',
            'is_localitate',
            'is_open_weekend',
            //'is_open_nonstop',
            //'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
