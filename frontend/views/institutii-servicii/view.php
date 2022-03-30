<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiServicii */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Institutii Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutii-servicii-view">
    <div class="container">
        <div class="row my-2">
            <div class="col-12 text-center">
                <h1 class="mb-2"><?= Html::encode($model->serviciu->tip_serviciu_denumire) ?></h1>
                <?= Html::a('Actualizare serviciu public', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Eliminare serviciu public', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12 text-center">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => 'Denumire instituție',
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
                            'label' => 'Denumire serviciu',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'value' => function ($model) {
                                return $model->serviciu->tip_serviciu_denumire;
                            }
                        ],
                        [
                            'label' => 'Denumire regiune',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'value' => function ($model) {
                                return $model->localitate->judet->regiune->regiune_nume;
                            }
                        ],
                        [
                            'label' => 'Denumire județ',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'value' => function ($model) {
                                return $model->localitate->judet->judet_nume;
                            }
                        ],
                        [
                            'label' => 'Denumire localitate',
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
                            'label' => 'Oferit în weekend?',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'format' => 'raw',
                            'value' => function ($model){
                                $content = "";

                                    switch($model->is_open_weekend){
                                        case 0:
                                            $content = '<span class="text-danger font-weight-bold">NU</span>';
                                            break;
                                        case 1:
                                            $content = '<span class="text-success font-weight-bold">DA</span>';
                                            break;
                                    }
                                return $content;
                            }
                        ],
                        [
                            'label' => 'Oferit NON STOP?',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'format' => 'raw',
                            'value' => function ($model){
                                $content = "";

                                switch($model->is_open_nonstop){
                                    case 0:
                                        $content = '<span class="text-danger font-weight-bold">NU</span>';
                                        break;
                                    case 1:
                                        $content = '<span class="text-success font-weight-bold">DA</span>';
                                        break;
                                }
                                return $content;
                            }
                        ],
                        [
                            'label' => 'Stare serviciu public',
                            'contentOptions' => [
                                'style' => [
                                    'text-align' => 'center',
                                    'vertical-align' => 'middle'
                                ]
                            ],
                            'format' => 'raw',
                            'value' => function ($model){
                                $content = "";

                                switch($model->is_active){
                                    case 0:
                                        $content = '<span class="text-danger font-weight-bold">Inactiv</span>';
                                        break;
                                    case 1:
                                        $content = '<span class="text-success font-weight-bold">Activ</span>';
                                        break;
                                }
                                return $content;
                            }
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
