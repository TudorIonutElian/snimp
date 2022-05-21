<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

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

            [
                'label' => 'Minister',
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Institutie',
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Structura subordonata',
                'value' => function ($model) {
                    if ($model->structuraSubordonata) {
                        return $model->structuraSubordonata->institutie_denumire_iss;
                    }
                    return 'Nu este cazul.';
                }
            ],

            [
                'label' => 'Localitate',
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],

            'strada_sspl',
            'numar_strada_sspl',
            'bloc_strada_sspl',
            'scara_bloc_sspl',
            'etaj_bloc_sspl',
            'apartament_sspl',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model, $data) {
                        return Html::a('<i class="fas fa-eye mr-2"></i>Vizualizeaza<br>', ['structuri-subordonate-puncte-lucru/view', 'id_sspl' => $data->id_sspl]);
                    },
                    'update' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-edit mr-2"></i>Actualizeaza<br>',
                            ['structuri-subordonate-puncte-lucru/update', 'id_sspl' => $data->id_sspl]
                        );
                    },
                    'delete' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-trash mr-2"></i>Șterge<br>',
                            ['structuri-subordonate-puncte-lucru/update', 'id_sspl' => $data->id_sspl],
                            ['data-method' => 'POST', 'class' => ['text-danger']]
                        );
                    },

                ]
            ],
        ],
    ]); ?>


</div>
