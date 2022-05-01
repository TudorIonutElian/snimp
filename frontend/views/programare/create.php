<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Adaugă programare';
$this->params['breadcrumbs'][] = ['label' => 'Listă programări', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
