<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programare', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'programare_minister',
            'programare_institutie',
            'programare_serviciu',
            'programare_localitate',
            //'programare_user',
            //'programare_datetime',
            //'programare_validata_de',
            //'programare_numar_unic',
            //'programare_data_numar_unic',
            //'programare_data_finalizare',
            //'programare_document_solicitat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Programare $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
