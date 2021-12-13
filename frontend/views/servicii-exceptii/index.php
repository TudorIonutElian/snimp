<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiciiExceptiiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicii Exceptiis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicii-exceptii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Servicii Exceptii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_se',
            'serviciu_id_se',
            'start_exceptie_se',
            'end_exceptie_se',
            'added_by_se',
            //'is_active_se',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
