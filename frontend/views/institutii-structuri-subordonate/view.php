<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */

$this->title = $model->id_iss;
$this->params['breadcrumbs'][] = ['label' => 'Institutii Structuri Subordonates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutii-structuri-subordonate-view">



    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <p>
                <?= Html::a('Actualizare date', ['update', 'id_iss' => $model->id_iss], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Ștergere înregistrare', ['delete', 'id_iss' => $model->id_iss], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'ID',
                'contentOptions' => [
                    'style' => [
                        'text-align' => 'center',
                        'vertical-align' => 'middle'
                    ]
                ],
                'value' => function ($model) {
                    return $model->id_iss;
                }
            ],
            [
                'label' => 'Instituția coordonatoare',
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
                'label' => 'Denumire structură subordonată',
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
                'label' => 'Data adăugării',
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
                'label' => 'Data actualizării',
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
                'value' => function ($model) {
                    switch ($model->institutie_stare_iss) {
                        case 0:
                            return '<span class="text-danger font-weight-bold">Inactivă</span>';
                            break;
                        case 1:
                            return '<span class="text-success font-weight-bold">Activă</span>';
                            break;
                    }
                }
            ],
        ],
    ]) ?>

</div>
