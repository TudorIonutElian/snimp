<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipuriDocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipuri Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-document-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipuri Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tip_document_denumire',
            'tip_document_adaugare',
            'tip_document_radiere',
            'tip_document_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
