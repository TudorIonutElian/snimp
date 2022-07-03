<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutiiExceptiiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listă excepții';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-exceptii-index">

    <h1 class="text-center my-2"><?= Html::encode($this->title) ?></h1>

    <p class="text-center my-2">
        <?= Html::a('Adaugă excepție în cadrul instituției', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Instituție',
                'value' => function($model){
                    return $model->institutie->institutie_denumire;
                }
            ],
            [
                'label' => 'Denumire Excepție',
                'value' => function($model){
                    return $model->exceptie->te_exceptie_denumire;
                }
            ],
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
