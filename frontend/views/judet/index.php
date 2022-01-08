<?php

use common\models\Regiune;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JudetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'label' => 'Regiune Județ',
                    'value' => function($model){
                        return $model->judetRegiune->regiune_nume;
                    },
                    'filter' => Select2::widget([
                        'name' => 'judet_regiune',
                        'value' => '',
                        'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                        'options' => ['multiple' => true, 'placeholder' => 'Selecteaza regiune ...']
                    ])
            ],
            'judet_indicativ',
            'judet_nume',
            [
                    'label' => 'Număr Localități',
                    'value' => function($model){
                        return count($model->localitati);
                    }
            ],
            //'judet_created',
            //'judet_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
