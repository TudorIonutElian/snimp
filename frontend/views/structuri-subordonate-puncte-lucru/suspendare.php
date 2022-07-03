<?php

use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StructuriSubordonatePuncteLucruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista puncte de lucru ce pot fi suspendate';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structuri-subordonate-puncte-lucru-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>


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
                'template' => '{propune-suspendare}',
                'visibleButtons' => [
                    'aproba' => function ($model, $data) {
                        if ($model->aprobat_administrator_sspl == 0) {
                            return Yii::$app->user->can('director_institutie');
                        }
                        return false;
                    },

                ],
                'buttons' => [
                    'propune-suspendare' => function ($model, $data) {
                        return Html::a(
                            '<i class="fas fa-band-aid mr-2"></i>Suspenda<br>',
                            '#',
                            [
                                'class' => ['btn btn-outline-danger btn-sm', 'suspenda-punct-lucru'],
                                'data-punct-lucru-id' => $data->id_sspl
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>
</div>

<?php
Modal::begin([
    'title' => '<h6 class="text-center font-weight-bold">Suspendare deschidere punct lucru</h6>',
    'id' => 'modal-suspendare-punct',
    'size' => 'modal-md',
    //'toggleButton' => ['label' => 'click me'],
]);

echo '<div id="modal-suspendare-punct-content"></div>';

Modal::end();
?>

<?php $this->registerJsFile("@web/js/plugins/views/structuri-subordonate-puncte-lucru/suspenda.js"); ?>
