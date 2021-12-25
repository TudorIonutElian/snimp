<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DomiciliuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Domicilius';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domiciliu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Domiciliu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'domiciliu_user',
            'domiciliu_regiune',
            'domiciliu_judet',
            'domiciliu_localitate',
            //'domiciliu_is_resedinta',
            //'domiciliu_status',
            //'domiciliu_data_adaugarii',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
