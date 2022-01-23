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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ministere Structuri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
