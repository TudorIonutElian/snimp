<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="auth-item-child-index">

    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1>Lista Roluri -> Permisiuni</h1>
                <?= Html::a('Adaugă Permisiune unui Rol', ['create'], ['class' => 'btn btn-success mx-3']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'parent',
            'child',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
