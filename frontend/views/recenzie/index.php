<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RecenzieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recenzies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recenzie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recenzie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recenzie_institutie',
            'recenzie_serviciu',
            'recenzie_localitate',
            'recenzie_mesaj:ntext',
            //'recenzie_adaugata_de',
            //'recenzie_numar_stele',
            //'recenzie_contact_email:email',
            //'recenzie_contact_mobil',
            //'recenzie_data_adaugare',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
