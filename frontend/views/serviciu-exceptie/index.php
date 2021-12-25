<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiciuExceptieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Serviciu Excepties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviciu-exceptie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Serviciu Exceptie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'se_serviciu',
            'se_serviciu_start_exceptie',
            'se_serviciu_end_exceptie',
            'se_serviciu_added_by',
            //'se_serviciu_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
