<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Localitate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Localitates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="localitate-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'localitate_nume',
            'localitate_judet',
            'localitate_status',
            'localitate_urban',
            'localitate_resedinta',
            'localitate_created',
            'localitate_updated',
        ],
    ]) ?>

</div>
