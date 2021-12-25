<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SesizareEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesizare Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizare-email-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sesizare Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sesizare_email_address:email',
            'sesizare_institutie',
            'sesizare_email_data_adaugare:email',
            'sesizare_email_status:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
