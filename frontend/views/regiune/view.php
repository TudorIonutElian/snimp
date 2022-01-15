<?php

use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Regiune */

$this->title = $model->regiune_nume;
$this->params['breadcrumbs'][] = ['label' => 'Regiunes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="regiune-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Denumire Regiune',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span>' . $model->regiune_nume . '</span>';
                }
            ],
            [
                'label' => 'Stare Regiune',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->regiune_status === 1) {
                        return '<span class="text-success font-weight-bold">Activă</span>';
                    }
                    return '<span class="text-danger font-weight-bold">Inactivă</span>';
                }
            ],
            [
                'label' => 'Data creării',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="text-primary">'.$model->regiune_created.'</span>';
                }
            ],
            [
                'label' => 'Data actualizării',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="text-primary">'.$model->regiune_updated.'</span>';
                }
            ],
        ],
    ]) ?>

</div>
