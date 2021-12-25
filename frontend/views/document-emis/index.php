<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentEmisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Document Emis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-emis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Document Emis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'document_tip',
            'document_user_id',
            'document_daca_emitere',
            'document_data_expirare',
            //'document_preluat',
            //'document_retras',
            //'document_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
