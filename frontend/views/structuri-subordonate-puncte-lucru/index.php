<?php

use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuriSubordonatePuncteLucruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adăugare punct de lucru';
$this->params['breadcrumbs'][] = ['label' => 'Lista puncte de lucru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-puncte-lucru-index">

    <h1 class="text-center">
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="fas fa-plus mr-2"></i>Adaugă punct lucru', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Minister',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Institutie',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Structura subordonata',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    if ($model->structuraSubordonata) {
                        return $model->structuraSubordonata->institutie_denumire_iss;
                    }
                    return 'Nu este cazul.';
                }
            ],

            [
                'label' => 'Localitate',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],
            [
                'label' => 'Strada',
                'attribute' => 'strada_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],

            [
                'label' => 'Număr',
                'attribute' => 'numar_strada_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],

            [
                'label' => 'Bloc',
                'attribute' => 'bloc_strada_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],

            [
                'label' => 'Scara',
                'attribute' => 'scara_bloc_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],

            [
                'label' => 'Etaj',
                'attribute' => 'etaj_bloc_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],

            [
                'label' => 'Apartament',
                'attribute' => 'apartament_sspl',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
            ],
            [
                'label' => 'Aprobat',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    $content = '<span class="text-danger font-weight-bold">NU</span>';
                    if ($model->aprobat_administrator_sspl == 1) {
                        $content = '<span class="text-success font-weight-bold">DA</span>';
                    } else if ($model->aprobat_administrator_sspl == 2) {
                        $content = '<span class="text-warning font-weight-bold">Propus spre suspendare</span>';
                    } else if ($model->aprobat_administrator_sspl == 3) {
                        $content = '<span class="text-danger font-weight-bold">Suspendat</span>';
                    }

                    return $content;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'template' => '{aproba} {view} {update} {delete} {reactivare}',
                'visibleButtons' => [
                    'aproba' => function ($model, $data) {
                        if ($model->aprobat_administrator_sspl == 0) {
                            return Yii::$app->user->can('admin_institutie');
                        }
                        return false;
                    },
                    'view' => function () {
                        return Yii::$app->user->can('director_institutie');
                    },
                    'update' => function ($model) {
                        if (Yii::$app->user->can('director_institutie')) {
                            if($model->aprobat_administrator_sspl == 1){
                                return true;
                            }
                            return false;
                        }
                        return false;
                    },
                    'delete' => function ($model, $data) {
                        if ($model->aprobat_administrator_sspl == 0) {
                            return Yii::$app->user->can('director_institutie');
                        }
                        return false;
                    },
                    'reactivare' => function($model){
                        if (Yii::$app->user->can('admin_institutie')) {
                            if($model->aprobat_administrator_sspl == 3){
                                return true;
                            }
                            return false;
                        }
                        return false;
                    }

                ],
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
                    'aproba' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-check-double mr-2"></i>Aprobă<br>',
                            '#',
                            [
                                'class' => ['btn btn-outline-success btn-sm', 'aproba_punct_lucru'],
                                'data-punct-lucru-id' => $data->id_sspl
                            ]
                        );
                    },
                    'reactivare' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-check-double mr-2"></i>Reactivare<br>',
                            '#',
                            [
                                'class' => ['btn btn-outline-success btn-sm', 'reactivare_punct_lucru'],
                                'data-punct-lucru-id' => $data->id_sspl
                            ]
                        );
                    },
                ]
            ],
        ],
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
    ]); ?>
</div>

<?php
Modal::begin([
    'title' => '<h6 class="text-center font-weight-bold">Aprobare deschidere punct lucru</h6>',
    'id' => 'modal-aprobare-punct',
    'size' => 'modal-md',
    //'toggleButton' => ['label' => 'click me'],
]);

echo '<div id="modal-aprobare-punct-content"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h6 class="text-center font-weight-bold">Redeschidere punct lucru</h6>',
    'id' => 'modal-redeschidere-punct',
    'size' => 'modal-md',
    //'toggleButton' => ['label' => 'click me'],
]);

echo '<div id="modal-redeschidere-punct-content"></div>';

Modal::end();
?>

<?php $this->registerJsFile("@web/js/plugins/views/structuri-subordonate-puncte-lucru/index.js"); ?>
