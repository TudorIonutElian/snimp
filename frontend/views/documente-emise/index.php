<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumenteEmiseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documente Emises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documente-emise-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Documente Emise', ['create'], ['class' => 'btn btn-success']) ?>
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
            'document_data_emitere',
            'document_data_expirare',
            //'document_preluat',
            //'document_retras',
            //'document_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
