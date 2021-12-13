<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutiiProgramariSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutii Programaris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-programari-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institutii Programari', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip_institutie_id',
            'ip_user_id',
            'ip_date_time',
            'ip_localitate_id',
            //'ip_validata_de',
            //'ip_status',
            //'ip_data_finalizare',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
