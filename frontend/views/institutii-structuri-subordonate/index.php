<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InstitutiiStructuriSubordonateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listă instituții subordonate direct';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-structuri-subordonate-index">

    <h1 class="text-center my-2">
        <?= Html::encode($this->title) ?><br>
        <?= Html::a('<i class="fas fa-plus mr-2"></i>Adaugă instituție subordonată', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Instituție Centrală',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutieParinte->institutie_denumire;
                }
            ],
            [
                'label' => 'Instituție subordonată',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie_denumire_iss;
                }
            ],
            [
                'label' => 'Data creare',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie_data_creare_iss;
                }
            ],
            [
                'label' => 'Data actualizare',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie_data_actualizare_iss;
                }
            ],
            [
                'label' => 'Stare',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'format' => 'raw',
                'value' => function ($model){
                    $content = "";

                    switch($model->institutie_stare_iss){
                        case 0:
                            $content = '<span class="text-danger font-weight-bold">Inactivă</span>';
                            break;
                        case 1:
                            $content = '<span class="text-success font-weight-bold">Activă</span>';
                            break;
                    }
                    return $content;
                }
            ],
            
            [
                'class' => ActionColumn::className(),
                'header' => 'Acțiuni Utilizatori',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'width' => '5%'
                    ]
                ],
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model, $data) {
                        return Html::a('<i class="fas fa-eye"></i>', ['institutii-structuri-subordonate/view', 'id_iss' => $data->id_iss], ['class' => 'btn btn-sm btn-outline-primary rounded']);
                    },
                    'update' => function ($model, $data) {
                        return Html::a('<i class="fas fa-edit"></i>', ['institutii-structuri-subordonate/update', 'id_iss' => $data->id_iss], ['class' => 'btn btn-sm btn-outline-secondary rounded']);
                    },
                    'delete' => function ($model, $data) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', ['institutii-structuri-subordonate/delete', 'id_iss' => $data->id_iss], ['class' => 'btn btn-sm btn-outline-danger rounded', 'data-method' => 'post']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
