<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */

$this->title = $model->id_sspl;
$this->params['breadcrumbs'][] = ['label' => 'Lista puncte de lucru', 'url' => ['index']];
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

            [
                'label' => 'Minister',
                'value' => function ($model) {
                    return $model->minister->minister_denumire;
                }
            ],
            [
                'label' => 'Institutie',
                'value' => function ($model) {
                    return $model->institutie->institutie_denumire;
                }
            ],

            [
                'label' => 'Structura subordonata',
                'value' => function ($model) {
                    if ($model->structuraSubordonata) {
                        return $model->structuraSubordonata->institutie_denumire_iss;
                    }
                    return 'Nu este cazul.';
                }
            ],

            [
                'label' => 'Localitate',
                'value' => function ($model) {
                    return $model->localitate->localitate_nume;
                }
            ],

            'strada_sspl',
            'numar_strada_sspl',
            'bloc_strada_sspl',
            'scara_bloc_sspl',
            'etaj_bloc_sspl',
            'apartament_sspl',
        ],
    ]) ?>

</div>
