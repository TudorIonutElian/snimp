<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuriSubordonatePuncteLucruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Structuri Subordonate Puncte Lucrus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-puncte-lucru-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Structuri Subordonate Puncte Lucru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sspl',
            'minister_id_sspl',
            'institutie_id_sspl',
            'structura_subordonata_id_sspl',
            'localitate_id_sspl',
            //'strada_sspl',
            //'numar_strada_sspl',
            //'bloc_strada_sspl',
            //'scara_bloc_sspl',
            //'etaj_bloc_sspl',
            //'apartament_sspl',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StructuriSubordonatePuncteLucru $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_sspl' => $model->id_sspl]);
                 }
            ],
        ],
    ]); ?>


</div>
