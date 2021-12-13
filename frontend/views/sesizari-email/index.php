<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SesizariEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesizari Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizari-email-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sesizari Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sesizare_email:email',
            'sesizare_email_status:email',
            'sesizare_email_data_adaugare:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
