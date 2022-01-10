<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Roluri Utilizatori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::a('Adaugă ROL', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($model, $data) {
                        return Html::a('<i class="fas fa-trash-alt text-danger"></i>Ștergere', ['auth-item/delete', 'name' => $data->name]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
