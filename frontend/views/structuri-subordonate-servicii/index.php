<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuriSubordonateServiciiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Structuri Subordonate Serviciis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-servicii-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Structuri Subordonate Servicii', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Institutie',
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Structura',
                'value' => function ($model) {
                    $structura = \common\models\InstitutiiStructuriSubordonate::find()->where(['id_iss' => $model->structura_subordonata_id_sss])->one();
                    return $structura->institutie_denumire_iss;
                }
            ],

            [
                'label' => 'Serviciul',
                'value' => function ($model) {
                    $serviciul = \common\models\TipuriServiciu::find()->where(['id' => $model->serviciu_id_sss])->one();
                    return $serviciul->tip_serviciu_denumire;
                }
            ],

            [
                'label' => 'Localitate',
                'value' => function ($model) {
                    $localitate = \common\models\Localitate::find()->where(['id' => $model->localitate_id_sss])->one();
                    return $localitate->localitate_nume;
                }
            ],

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_weekend_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_weekend_sss == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Disponibil Non Stop?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_nonstop_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_nonstop_sss == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Stare Serviciu',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_active_sss == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Inactiv</span>';
                    }else if($model->is_active_sss == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Activ</span>';
                    }
                    return $content;
                }
            ],
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
