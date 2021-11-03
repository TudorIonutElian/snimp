<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="container">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="row">
            <div class="col-12">
                <?php Pjax::begin([]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'username',
                        //'password_hash',
                        //'password_reset_token',
                        //'email:email',
                        //'status',
                        //'created_at',
                        //'updated_at',
                        //'localitate_id',
                        //'verification_token',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
