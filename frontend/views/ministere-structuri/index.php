<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinistereStructuriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ministere Structuris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-structuri-index">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-12">

            <p class="text-center">
                <?= Html::a('Create Ministere Structuri', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>




    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Minister',
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Structura',
                'value' => function ($model) {
                    return $model->structura->structura_nume;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} '
            ],
        ],
    ]); ?>


</div>
