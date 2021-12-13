<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocumenteEmise */

$this->title = 'Create Documente Emise';
$this->params['breadcrumbs'][] = ['label' => 'Documente Emises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documente-emise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
