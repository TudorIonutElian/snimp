<?php

use common\models\Judet;
use yii\bootstrap4\Modal;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizatori';
$this->params['breadcrumbs'][] = $this->title;

\kartik\select2\Select2Asset::register($this);
?>
<div class="user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        Modal::begin([
            //'title' => '<h2 class="text-center text-success font-weight-bold">Adăugare Utilizator Nou</h2>',
            'id' => 'modal-adaugare-user',
            'size' => 'modal-lg',
            //'toggleButton' => ['label' => 'click me'],
        ]);

        echo '<div id="modal-adaugare-user-content"></div>';

        Modal::end();
    ?>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center col-flex-row">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::button('Adaugă UTILIZATOR', ['value' => \yii\helpers\Url::to(['user/create']), 'class' => 'btn btn-success mx-3', 'id' => 'add-user-btn']) ?>
            </div>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '1%'
                    ]
                ],
            ],

            [
                'label' => 'Username',
                'attribute' => 'username',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '10%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->username;
                }
            ],
            [
                'label' => 'Nume',
                'attribute' => 'nume',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->nume;
                }
            ],
            [
                'label' => 'Prenume',
                'attribute' => 'prenume',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->prenume;
                }
            ],
            [
                'label' => 'Email',
                'attribute' => 'email',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->email;
                }
            ],
            [
                'label' => 'Stare',
                'attribute' => 'status',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    if ($model->status === 10) {
                        return '<span class="text-success font-weight-bold">Activ</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactiv</span>';
                }
            ],
            [
                'label' => 'Localitate',
                'attribute' => 'localitate_id',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    if (!is_null($model->localitate)) {
                        return $model->localitate->localitate_nume;
                    }
                    return '-';

                }
            ],
            [
                'label' => 'Judet',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    if (!is_null($model->localitate)) {
                        $judet = Judet::findOne($model->localitate->id);
                        if(!is_null($judet)){
                            return $judet->judet_nume;
                        }
                        return '-';
                    }
                    return '-';

                }
            ],
            [
                'label' => 'Rol',
                'format' => 'raw',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle',
                        'white-space' => 'pre-line',
                        'width' => '8%'
                    ]
                ],
                'value' => function ($model) {
                    return $model->authAssignment->item_name;
                }
            ],

            [
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
                    'view' => function ($model) {
                        return Html::a('<i class="fas fa-eye"></i>', $model, ['class' => 'btn btn-sm btn-outline-primary rounded']);
                    },
                    'update' => function ($model) {
                        return Html::a('<i class="fas fa-edit"></i>', $model, ['class' => 'btn btn-sm btn-outline-secondary rounded']);
                    },
                    'delete' => function ($model) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', $model, ['class' => 'btn btn-sm btn-outline-danger rounded', 'data-method' => 'post']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
