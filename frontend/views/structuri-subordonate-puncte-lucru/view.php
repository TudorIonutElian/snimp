<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */

$this->title = $model->id_sspl;
$this->params['breadcrumbs'][] = ['label' => 'Structuri Subordonate Puncte Lucrus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="structuri-subordonate-puncte-lucru-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_sspl' => $model->id_sspl], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_sspl' => $model->id_sspl], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sspl',
            'minister_id_sspl',
            'institutie_id_sspl',
            'structura_subordonata_id_sspl',
            'localitate_id_sspl',
        ],
    ]) ?>

</div>
