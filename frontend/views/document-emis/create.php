<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocumentEmis */

$this->title = 'Create Document Emis';
$this->params['breadcrumbs'][] = ['label' => 'Document Emis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-emis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
