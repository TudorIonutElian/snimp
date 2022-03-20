<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PrestariSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prestaris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestari-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prestari', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'institutie_id_p',
            'serviciu_id_p',
            'denumire_p',
            'stare_p',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prestari $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
