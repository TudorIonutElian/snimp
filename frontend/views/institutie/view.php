<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Institutii', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institutie-view">


    <div class="container">
        <div class="row">
            <div class="col-12 mb-2 text-center">
                <?= Html::a('Actualizare instituție', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Ștergere instituție', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <h1 class="mt-2"><?= Html::encode($model->institutie_denumire) ?></h1>

            </div>
            <div class="col-12">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'label' => 'Tipuri structurii',
                            'value' => function ($model) {
                                return $model->structura->structura_nume;
                            }
                        ],
                        [
                            'label' => 'Denumire instituție',
                            'value' => function ($model) {
                                return $model->institutie_denumire;
                            }
                        ],

                        [
                            'label' => 'Regiune instituție',
                            'value' => function ($model) {
                                return $model->localitate->judet->regiune->regiune_nume;
                            }
                        ],

                        [
                            'label' => 'Județ instituție',
                            'value' => function ($model) {
                                return $model->localitate->judet->judet_nume;
                            }
                        ],

                        [
                            'label' => 'Localitate instituție',
                            'value' => function ($model) {
                                return $model->localitate->localitate_nume;
                            }
                        ],

                        [
                            'label' => 'Data înrolare instituție',
                            'value' => function ($model) {
                                return $model->institutie_data_creare;
                            }
                        ],
                        [
                            'label' => 'Stare instituție',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $content = "";
                                switch ($model->institutie_status) {
                                    case 0:
                                        $content = '<span class="bg-danger text-white rounded p-2">Inactivă</span>';
                                        break;
                                    case 1:
                                        $content = '<span class="bg-success text-white rounded p-2">Activă</span>';
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
