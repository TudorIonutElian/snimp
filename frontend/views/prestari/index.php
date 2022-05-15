<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PrestariSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista Prestări';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestari-index">

    <h1 class="text-center">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Adăugare Prestare nouă', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>

    <p>

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
                'label' => 'Serviciu',
                'value' => function ($model) {
                    return $model->tipServiciu->tip_serviciu_denumire;
                }
            ],


            'denumire_p',

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_weekend == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_weekend == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Disponibil in wekeend?',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_open_nonstop == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Nu</span>';
                    }else if($model->is_open_nonstop == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Da</span>';
                    }
                    return $content;
                }
            ],

            [
                'label' => 'Stare',
                'format' => 'raw',
                'value' => function ($model) {
                    $content = '';
                    if ($model->is_active == 0) {
                        $content = '<span class="text-center text-danger font-weight-bold">Inactiv</span>';
                    }else if($model->is_active == 1){
                        $content = '<span class="text-center text-success font-weight-bold">Activ</span>';
                    }
                    return $content;
                }
            ],
        ],
    ]); ?>


</div>
