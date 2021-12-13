<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriDocumenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipuri Documentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-documente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipuri Documente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'document_denumire',
            'document_data_creare',
            'document_data_radiere',
            'document_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
